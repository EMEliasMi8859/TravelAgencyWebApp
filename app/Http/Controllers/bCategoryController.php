<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\BCategory;
use Auth;

class bCategoryController extends Controller
{
   
    public function AllBCategory()
    {
        $bCategories =  BCategory::latest()->paginate(5);
        
        return view('admin.blog.bCategory', compact('bCategories'));
       

    }
  
    public function addBCategory(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            'category_info' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please input Category Name', 
            'category_name.unique' => 'Please It Should Be unique',
        ]);

        BCategory::insert([
            'category_name' => $request->category_name,
            'category_info' => $request->category_info,
            'user_id' =>Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success','Category Inserted Successfully.');
    }
}
