<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function AllCat()
    {
        $categories = Category::all();
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index', compact('categories','trashCat'));
        return view('layouts.master_home', compact('categories'));
    }

    public function AddCat(Request $request){

        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            'category_info' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please input Category Name', 
            'category_name.unique' => 'Please It Should Be unique',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_info' => $request->category_info,
            'user_id' =>Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success','Category Inserted Successfully.');
    }

    public function Edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }
    public function Update(Request $request, $id)
    {
            $update = Category::find($id)->update([

            'category_name' => $request->category_name,
            'category_info' => $request->category_info,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('all.category')->with('success','Category Updated Successfully.');
    }


    public function SoftDelete($id)
    {
         $delete = Category::find($id)->delete();
         return Redirect()->back()->with('success', 'Category Soft Delete Successfully.');

    }

    public function Restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category Restore Successfully.');

    }

    public function PDelete($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category  Deleted  Permanently.');
    }

}
