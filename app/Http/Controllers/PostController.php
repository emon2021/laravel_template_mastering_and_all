<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //__index__//
    public function index()
    {
        return view('admin/post/index');
    }



    //__create__//
    public function create()
    {
        return view('admin/post/create');
    }
}
