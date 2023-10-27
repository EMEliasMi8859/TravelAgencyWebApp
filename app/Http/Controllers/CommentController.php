<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class CommentController extends Controller
{
   public function AddComment(Request $request, $id)
   {
    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'comment'=> 'required'
    ],
    [
        'name.required' => 'Please input Name', 
        'email.required'=> 'Please input The Email',
  
       
    ]);

    Comment::insert([
        'name' => $request->name,
        'email ' => $request->email,
        'website'=> $request->website,
        'comment'=> $request->comment,
        'blog_id'=> $id,
        'created_at' => Carbon::now()
    ]);
    return redirect()->back()->with('success','Category Inserted Successfully.');
   }
}
