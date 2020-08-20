<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Typecourse;
use Illuminate\Http\Request;

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

        return view('admin.typecourse.index', compact('typecourse'));
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
            'title' => 'required|unique:categories'
        ]);

        $typecourse = Typecourse::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title'), '-') 
        ]);

        if($typecourse){
            //redirect dengan pesan sukses
            return redirect()->route('admin.typecourse.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.typecourse.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
