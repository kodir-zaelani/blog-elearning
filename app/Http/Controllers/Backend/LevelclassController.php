<?php

namespace App\Http\Controllers\Backend;

use App\Models\Levelclass;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelclassController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:levelclasses.index|levelclasses.create|levelclasses.edit|levelclasses.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levelclasses = Levelclass::orderBy('id','asc')->when(request()->q, function($levelclasses) {
            $levelclasses = $levelclasses->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.levelclass.index', compact('levelclasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levelclass.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:levelclasses',
            'idalphabet' => 'required|unique:levelclasses',
            'enalphabet' => 'required|unique:levelclasses'
        ]);

        $levelclass = Levelclass::create([
            'title' => $request->input('title'),
            'idalphabet' => $request->input('idalphabet'),
            'enalphabet' => $request->input('enalphabet'),
            'slug' => Str::random(8)
        ]);

        if($levelclass){
            //redirect dengan pesan sukses
            return redirect()->route('admin.levelclass.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.levelclass.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Levelclass $levelclass)
    {
        return view('admin.levelclass.edit', compact('levelclass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Levelclass $levelclass)
    {
        $this->validate($request, [
            'title' => 'required|unique:categories,title,'.$levelclass->id,
            'idalphabet' => 'required|unique:levelclasses',
            'enalphabet' => 'required|unique:levelclasses'
        ]);

        $levelclass = Levelclass::findOrFail($levelclass->id);
        $levelclass->update([
            'title' => $request->input('title'),
            'idalphabet' => $request->input('idalphabet'),
            'enalphabet' => $request->input('enalphabet')
        ]);

        if($levelclass){
            //redirect dengan pesan sukses
            return redirect()->route('admin.levelclass.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.levelclass.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
