<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //__index__//
    public function index()
    {
        $post = Post::all();
        return view('admin/post/index',compact('post'));
    }

    //__create__//
    public function create()
    {
       $data['category'] = Category::all();
       //$data['sub_cat'] = SubCategory::all();
        return view('admin/post/create',$data);
    }
}
