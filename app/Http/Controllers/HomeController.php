<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\RegisterCustomer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $customers = RegisterCustomer::all();
        $posts = Post::orderBy('id', 'desc')->limit(3)->get();
        $categories = Category::orderBy('id', 'desc')->limit(6)->get();
        
        return view('home', compact('customers', 'posts', 'categories'));
    }
}