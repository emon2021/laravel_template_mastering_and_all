<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //show categories list
    public function index()
    {
        $data['cat_info'] = Category::select('category_id','category_name','category_slug')->get();
        return view('admin.categories.allCategory',$data);
    }
    // category create
    public function create()
    {
        return view('admin.categories.addCategory');
    }
    //category store
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string',
        ]);
        $model = new Category();
        $model->category_name = $request->category_name;
        $model->category_slug = Str::of($request->category_name)->slug('-');
        $model->save();
        return redirect()->back()->with('success','Category added successfully!');
    }
/// category delete
    public function destroy(Request $request)
    {
        $id = $request->cat_id;
        Category::where('category_id',$id)->delete();
        return redirect()->back()->with('delete_success','Category Deleted successfully!');
    }
    //category edit
    public function edit($id)
    {
        // $cat_id = Category::find($id);
        $data['category'] = Category::select('category_id','category_name')->where('category_id',$id)->get();
        return view('admin.categories.editCategory',$data);
    }
    //category update
    public function update(Request $request,$id)
    {
        $request->validate([
            'category_name' => 'required|string',
        ]);
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();
        return redirect()->route('categories.index')->with('updated','Category updated successfully!');

    }
}
