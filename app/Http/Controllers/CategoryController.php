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
    public function create()
    {
        return view('admin.categories.addCategory');
    }
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

    public function destroy(Request $request)
    {
        $id = $request->cat_id;
        Category::where('category_id',$id)->delete();
        return redirect()->back()->with('delete_success','Category Deleted successfully!');
    }
}
