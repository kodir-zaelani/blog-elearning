<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:permissions.index|permissions.create']);
    } 

    /**
     * function index
     *
     * @return void
     */
    public function index()
    {
        $permissions = Permission::latest()->when(request()->q, function($permissions) {
            $permissions = $permissions->where('name', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions'
        ]);

        $permission = Permission::create([
            'name' => $request->input('name'),
        ]);

        if($permission){
            //redirect dengan pesan sukses
            return redirect()->route('admin.permission.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.permission.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
