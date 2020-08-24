<?php

namespace App\Http\Controllers\Backend;

use App\Models\Room;
use App\Models\Classroom;
use App\Models\Department;
use App\Models\Levelclass;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassroomController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:classrooms.index|classrooms.create|classrooms.edit|classrooms.delete']);
    }

    public function index(Request $request)
    {
        $departments = Department::orderBy('title_id', 'asc')->get();
        $levelclasses = Levelclass::orderBy('id', 'asc')->get();
        $classrooms = Classroom::latest()
                        ->where('levelclass_id', 'like', '%'. $request->input('levelclass_id') . '%')
                        ->where('department_id', 'like', '%'. $request->input('department_id') . '%')
                        ->paginate(5);
        return view('admin.classroom.index', compact('classrooms', 'levelclasses', 'departments'));
    }


    public function create()
    {
        $departments = Department::orderBy('id', 'asc')->get();
        $rooms = Room::orderBy('id', 'asc')->get();
        $levelclasses = Levelclass::orderBy('id', 'asc')->get();

        return view('admin.classroom.create', compact('departments', 'levelclasses', 'rooms'));
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
            'levelclass_id' => 'required',
            'department_id' => 'required',
            'room_id' => 'required'
        ]);

        $classroom = Classroom::create([
            'levelclass_id' => $request->input('levelclass_id'),
            'department_id' => $request->input('department_id'),
            'room_id' => $request->input('room_id'),
            'slug' => Str::random(6) 
        ]);

        if($classroom){
            //redirect dengan pesan sukses
            return redirect()->route('admin.classroom.index')->with(['success' => 'Data Classroom Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.classroom.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


}
