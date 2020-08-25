<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {

        return view('admin.dashboard.index');
    }
}
