<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

use App\Models\Post;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function AllPosts()
    {
        $categories = Category::all();
        $posts = Post::latest()->paginate(5);
        $trashPost = Post::onlyTrashed()->latest()->paginate(3);
        return view('admin.post.index', compact('categories', 'posts', 'trashPost'));
    }

    public function AddPost(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|max:255',
                'content' => 'required',
                'category_id' => 'required|max:4',


            ],
            [
                'title.required' => 'Please input Title',
                'content.required' => 'Please input content',

                'category_id.max' => 'Please Type At 20 Character ',

            ]
        );

        $post_pic = $request->file('post_pic');
        $name_gen = hexdec(uniqid());
        $image_text = strtolower($post_pic->extension());
        $image_name = $name_gen . '.' . $image_text;
        $upload_location = 'image/post/';
        $last_image = $upload_location . $image_name;
        $post_pic->move($upload_location, $image_name);


        Post::insert([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'post_pic' => $last_image,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Post Created Successfully.');
    }

    public function Edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view("admin.post.edit", compact("post", "categories"));
    }
    public function Update(Request $request, $id)
    {
        if ($request->hasFile('post_pic')) {

            $post_pic = $request->file('post_pic');
            $name_gen = hexdec(uniqid());
            $image_text = strtolower($post_pic->extension());
            $image_name = $name_gen . '.' . $image_text;
            $upload_location = 'image/post/';

            $last_image = $upload_location . $image_name;
            $post_pic->move($upload_location, $image_name);
            // if(File::exists($last_image)){
            //     File::delete($last_image);
            // }

        }

        $update = Post::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,

            'post_pic' => $last_image



        ]);
        return Redirect()->route('all.post')->with('success', 'Post Updated Successfully.');
    }
    public function SoftDelete($id)
    {
        $delete = Post::find($id)->delete();
        return Redirect()->back()->with('success', 'Post Soft Delete Successfully.');
    }


    public function PostDetail($id)
    {
        $post = Post::find($id);
        return view("fontend.post_detail", compact("post"));
    }

    public function PDelete($id)
    {
        $post = Post::onlyTrashed()->find($id);
        // dd($post);
        $delete =  Post::onlyTrashed()->find($id)->forceDelete();
        if ($delete) {
            $path = $post->post_pic;
            if (file_exists(public_path($path))) {
                unlink($path);
            }
        }

        return redirect()->back()->with('success', 'Post is permanently Deleted');
    }
    public function Restore($id)
    {
        $restore = Post::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Post Restore Successfully.');
    }
}
