<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin(){

        return view('admin.dashboard');

    }
    public function adminnmagazine(){

        return view('admin.blogs.index');

    }
    public function adminreferences()
    {
        return view('admin.reference.index');
    }
}
