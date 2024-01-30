<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function AllBlogCategory(){
        $blog_category = BlogCategory::latest()->get();
        return view('backend.category.blog_category',compact('blog_category'));
    } //end method

    public function StoreBlogCategory(Request $request){
        // Validation
        $request->validate([
            'category_name' => 'required'
        ]);
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {
            BlogCategory::insert([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ','-', $request->category_name)) 
            ]);   
            $notification = array(
                'message' => 'Category Created successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->route('all.blog.category')->with($notification);

        } catch (\Exception $e) {            
            DB::rollback();
            $message = $e->getMessage();
            $notification = array(
                'message' => $message,
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
            // something went wrong
        }

    } //end method 
}
