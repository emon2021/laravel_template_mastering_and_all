<?php

namespace App\Http\Controllers;

use App\Events\PostProcessed;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //__index__//
    public function index()
    {
        $post = Post::Select('id as post_id','cat_id','subCat_id','image','user_id','title','description','status','post_date','tags')->get();
        
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
        if($request->status == null){
            $post->status = 0;
        }else{
            $post->status = $request->status;
        }
        
        $post->tags = $request->tags;

        //__event calling__//
        $data['title'] = $request->title;
        $data['date'] = date('d M Y');
        event(new PostProcessed($data));
        //__ -/event calling__//


        $photo = $request->file('image');
        if($photo)
        {
            $imgManger = new ImageManager(new Driver());
            $picName = md5(sha1($slug.uniqid())).'.'.$photo->getClientOriginalExtension();
            $image = $imgManger->read($photo);
            $image = $image->resize(600,400);
            $image->toJpeg(100)->save(base_path("public/media/$picName"));

            $post->image = "media/$picName";
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

    //__destroy__//
    public function destroy(Request $request)
    {

        $post = Post::find($request->post_id);
        if(File::exists($post->image)){
            $dlt = File::delete(base_path('public/'.$post->image)); //base_path is for select a path
            if($dlt == true)
            {
                $post->delete();
            }
        }else{
            $post->delete();
        }
        
        //toaster alert notification
        $notification = array(
            'message' => 'Post Deleted Successfully!',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    //__edit__//
    public function edit($id)
    {
        $data['category'] = Category::all();
        $data['posts'] = Post::select('id','title','description','image','tags','status','cat_id')->where('id',$id)->first();
        return view('admin/post/edit',$data);
    }


    //__update__//
    public function update(Request $request)
    {
        
        // $validate = $request->validate([
        //     'category' => 'required',
        //     'title' => 'required',
        //     'description' => 'required',
        //     'post_date' => 'required',
        //     'tags' => 'required',
        // ]);
        
        $id = $request->hidden_id;
        $subCat = 2;
        $post = Post::find($id);
        $post->cat_id = $request->category;
        $post->subCat_id = $subCat;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $slug = Str::of($request->title)->slug('-');
        $post->slug = $slug;
        $post->description = $request->description;
        if($request->status == null){
            $post->status = 0;
        }else{
            $post->status = $request->status;
        }
        $post->tags = $request->tags;
       
        $photo = $request->file('old_image');
        if($photo)
        {
            if(File::exists($post->image)){
                $dlt = File::delete(base_path('public/'.$post->image)); //base_path is for select a path
            }
            
            $imgManger = new ImageManager(new Driver());
            $picName = md5(sha1($slug.uniqid())).'.'.$photo->getClientOriginalExtension();
            $image = $imgManger->read($photo);
            $image = $image->resize(600,400);
            $image->toJpeg(100)->save(base_path("public/media/$picName"));

            $post->image = "media/$picName";
            $post->update();
        }
        //__without image save__//
        $post->update();
        //toaster alert notification
        $notification = array(
            'message' => 'Post Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('post.index')->with($notification);
    }
}
