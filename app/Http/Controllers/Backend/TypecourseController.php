<?php

namespace App\Http\Controllers\Backend;

use App\Models\Typecourse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypecourseController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:typecourses.index|typecourses.create|typecourses.edit|typecourses.delete']);
        $this->uploadPath = public_path(config('cms.image.directoryPhotos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typecourses = Typecourse::latest()->when(request()->q, function($typecourses) {
            $typecourses = $typecourses->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.typecourse.index', compact('typecourses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typecourse.create');
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
            'title_id' => 'required|unique:typecourses',
            'title_en' => 'required|unique:typecourses'
        ]);

        $typecourse = Typecourse::create([
            'title_id' => $request->input('title_id'),
            'title_en' => $request->input('title_en'),
            'slug' => Str::random(6) 
        ]);

        if($typecourse){
            //redirect dengan pesan sukses
            return redirect()->route('admin.typecourse.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.typecourse.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Typecourse $typecourse)
    {
        return view('admin.categories.edit', compact('typecourse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typecourse $typecourse)
    {
        $this->validate($request, [
            'title_id' => 'required|unique:categories,title_id,'.$typecourse->id,
            'title_en' => 'required|unique:categories,title_en,'.$typecourse->id
        ]);

        $typecourse = Typecourse::findOrFail($typecourse->id);
        $typecourse->update([
            'title_id' => $request->input('title_id'),
            'title_en' => $request->input('title_en'),
        ]);

        if($typecourse){
            //redirect dengan pesan sukses
            return redirect()->route('admin.typecourse.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.typecourse.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $typecourse = Typecourse::findOrFail($id);
        $typecourse->delete();

        if($typecourse){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
