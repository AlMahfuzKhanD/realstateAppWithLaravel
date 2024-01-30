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

    public function EditBlogCategory($id) {
        $categories = BlogCategory::findOrFail($id);
        return response()->json($categories);
    }

    public function UpdateBlogCategory(Request $request) {
        $category_id = $request->cat_id;
        $request->validate([
            'category_name_edit' => 'required'
        ]);
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {
            BlogCategory::findOrFail($category_id)->update([
                'category_name' => $request->category_name_edit,
                'category_slug' => strtolower(str_replace(' ','-', $request->category_name_edit)) 
            ]);   
            $notification = array(
                'message' => 'Category Updated successfully!!',
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
    }

    public function DeleteBlogCategory($id){

       BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted successfully!!',
            'alert-state' => 'success'
        );
        return redirect()->back()->with($notification);

    } // DeleteBlogCategory
}
