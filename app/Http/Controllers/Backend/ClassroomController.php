<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Department;
use App\Models\Levelclass;

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

    public function index()
    {
        $departments = Department::orderBy('title_id', 'asc')->get();
        $levelclasses = Levelclass::orderBy('title', 'asc')->get();
        $classrooms = Classroom::latest()->when(request()->q, function($classrooms) {
            $classrooms = $classrooms->where('name', 'like', '%'. request()->q . '%');
        })->paginate(5);
        return view('admin.classroom.index', compact('classrooms', 'levelclasses', 'departments'));
    }


    public function create()
    {
        $departments = Department::orderBy('id', 'asc')->get();
        $levelclasses = Levelclass::orderBy('id', 'asc')->get();

        return view('admin.classroom.create', compact('departments', 'levelclasses'));
    }

    public function store()
    {
        
    }


}
