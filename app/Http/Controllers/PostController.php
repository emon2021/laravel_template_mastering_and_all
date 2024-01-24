<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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

    //__store__//
    public function store(Request $request)
    {
        $validate = $request->validate([
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'post_date' => 'required',
            'status' => 'required',
            'tags' => 'required',
        ]);
        $subCat = 2;
        $post = new Post();
        $post->cat_id = $request->category;
        $post->subCat_id = $subCat;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $slug = Str::of($request->title)->slug('-');
        $post->slug = $slug;
        $post->description = $request->description;
        $post->post_date = $request->post_date;
        $post->status = $request->status;
        $post->tags = $request->tags;

        $photo = $request->file('image');
        if($photo)
        {
            $imgManger = new ImageManager(new Driver());
            $picName = md5(sha1($slug.uniqid())).'.'.$photo->getClientOriginalExtension();
            $image = $imgManger->read($photo);
            $image = $image->resize(600,400);
            $image->toJpeg(100)->save(base_path("public/media/$picName"));

            $post->image = "public/media/$picName";
            $post->save();
        }
        //__without image save__//
        $post->save();
        //toaster alert notification
        $notification = array(
            'message' => 'Posted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
