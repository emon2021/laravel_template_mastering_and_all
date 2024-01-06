<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    //create subCategory
    public function create()
    {
       
       $category = new Category();
       $data['cats_all'] = $category -> all();
        return view('admin.subCategory.create',$data);
    }
    //store subCategory
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'string|required',
        ]);
        $subCategory = new SubCategory();
        $subCategory -> cat_id = $request->cat_name;
        $subCategory -> subcategory_name = $request->subcategory_name;
        $subCategory -> subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subCategory->save();
        //toaster alert notification
        $notification = array(
            'message' => 'Category Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    //index subCategory
    public function index()
    {
        $data['cat_info'] = SubCategory::all();
        return view('admin.subCategory.index',$data);
    }
}
