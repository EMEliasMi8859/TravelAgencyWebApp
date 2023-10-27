<?php

namespace App\Http\Controllers;
use App\Models\BCategory;
use Illuminate\Support\Carbon;
use App\Models\Blog;

use Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function AllBlogs()
    {
        // $blogs = Blog::all();
        $bCategories = BCategory::all();
        $blogs = Blog::all();
       
        return view('admin.blog.index', compact('bCategories', 'blogs'));
       

    } 

    public function ShowBlogs()
    {
        $blogCategories = BCategory::latest()->paginate(6);
        $blogPosts = Blog::latest()->paginate(5);
        return view('fontend.blog', compact('blogCategories', 'blogPosts'));
    }


     public function AddBPost(Request $request)
     {
        $validated = $request->validate(
            [
                'title' => 'required|max:255',
                'content' => 'required|max:5000',
                'b_category_id' => 'required|max:4',


            ],
            [
                'title.required' => 'Please input Title',
                'content.required' => 'Please input content',
                'content.max' => 'Please Type At 5000 Character ',
                'b_category_id.max' => 'Please Type At 20 Character ',

            ]
        );

        $blog_pic = $request->file('blog_pic');
        $name_gener = hexdec(uniqid());
        $image_text = strtolower($blog_pic->extension());
        $image_name = $name_gener . '.' . $image_text;
        $upload_location = 'image/post/';
        $last_image = $upload_location . $image_name;
        $blog_pic->move($upload_location, $image_name);


        Blog::insert([
            'title' => $request->title,
            'content' => $request->content,
            'b_category_id' => $request->b_category_id,
            'blog_pic' => $last_image,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Blogs Post Created Successfully.');
     }

     public function ShowBlogDetail($id)
     {
        $blogCategories = BCategory::latest()->paginate(6);
        $blogPosts = Blog::latest()->paginate(5);
        $blog = Blog::find($id);
        return view("fontend.blogDetails", compact('blog','blogCategories','blogPosts'));
     }
}
