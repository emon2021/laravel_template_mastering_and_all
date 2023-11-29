<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //show categories list
    public function index()
    {
        $data['cat_info'] = Category::select('category_name','category_slug')->get();
        return view('admin.categories.allCategory',$data);
    }
    public function create()
    {
        
    }
}
