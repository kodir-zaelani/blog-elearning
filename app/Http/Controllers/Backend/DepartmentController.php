<?php

namespace App\Http\Controllers\Backend;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:departments.index|departments.create|departments.edit|departments.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('id','ASC')->when(request()->q, function($departments) {
            $departments = $departments->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
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
            'title_id' => 'required|unique:departments',
            'title_en' => 'required|unique:departments',
            'short_id' => 'required|unique:departments',
            'short_en' => 'required|unique:departments'
        ]);

        $department = Department::create([
            'title_id' => $request->input('title_id'),
            'title_en' => $request->input('title_en'),
            'short_id' => $request->input('short_id'),
            'short_en' => $request->input('short_en'),
            'slug' => Str::random(8)
            
        ]);

        if($department){
            //redirect dengan pesan sukses
            return redirect()->route('admin.department.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.department.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $this->validate($request, [
            'title_id' => 'required|unique:departments,title_id,'.$department->id,
            'title_en' => 'required|unique:departments,title_en,'.$department->id,
            'short_id' => 'required|unique:departments,short_id,'.$department->id,
            'short_en' => 'required|unique:departments,short_en,'.$department->id
        ]);

        $department = Department::findOrFail($department->id);
        $department->update([
            'title_id' => $request->input('title_id'),
            'title_en' => $request->input('title_en'),
            'short_id' => $request->input('short_id'),
            'short_en' => $request->input('short_en')
        ]);

        if($department){
            //redirect dengan pesan sukses
            return redirect()->route('admin.department.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.department.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
}
