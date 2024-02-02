<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
 
    public function AllPost(){
        $all_post = BlogPost::latest()->get();
        return view('backend.post.all_post',compact('all_post'));
    } //end method

    public function AddPost(){
        $blog_categories = BlogCategory::latest()->get();
        return view('backend.post.add_post',compact('blog_categories'));
    } //end method

    public function StorePost(Request $request){
        // Validation
        $request->validate([
            'post_title' => 'required',
        ]);

        
        DB::beginTransaction();

        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        try {
            if($request->file('post_image')){
                $selected_image = $request->file('post_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()).'.'.$selected_image->getClientOriginalExtension();
                $img = $manager->read($selected_image);
                $img = $img->resize(370,250);
                $img->toJpeg(80)->save(base_path('public/upload/blog/post'.$name_gen));
                $save_url = 'upload/blog/post'.$name_gen;
            }
    
            BlogPost::insert([
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ','-', $request->post_title)),
                'blog_cat_id' => $request->blog_cat_id,
                'user_id' => Auth::user()->id,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'post_tags' => $request->post_tags,
                'post_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
    
            $notification = array(
                'message' => 'Post Created successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->route('all.post')->with($notification);

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with($notification);
            // something went wrong
        }

    }

    public function EditPost($id){

        // Validation
        $blog_categories = BlogCategory::latest()->get();
        $post = BlogPost::findOrFail($id);
        return view('backend.post.edit_post',compact('post','blog_categories'));

    } //end method

    public function UpdatePost(Request $request){
       
        $post_id = $request->post_id;
        $old_post_image = $request->old_post_image;
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {

            if($request->file('post_image')){

                $selected_image = $request->file('post_image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()).'.'.$selected_image->getClientOriginalExtension();
                $img = $manager->read($selected_image);
                $img = $img->resize(370,250);
                $img->toJpeg(80)->save(base_path('public/upload/blog/post/'.$name_gen));
                $save_url = 'upload/blog/post/'.$name_gen;
            }

            if(file_exists($old_post_image)){
                unlink($old_post_image);
            }

            BlogPost::findOrFail($post_id)->update([
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ','-', $request->post_title)),
                'blog_cat_id' => $request->blog_cat_id,
                'user_id' => Auth::user()->id,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'post_tags' => $request->post_tags,
                'post_image' => $save_url,
                'updated_at' => Carbon::now()
            ]);


            $notification = array(
                'message' => 'Post Updated successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->route('all.post')->with($notification);

            // all good
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

        

    } // end of UpdatePropertyThumbnail

    public function DeletePost($id){

        $post = BlogPost::findOrFail($id);
        $img = $post->post_image;
        unlink($img);
        
        $post->delete();

        $notification = array(
            'message' => 'Post Deleted successfully!!',
            'alert-state' => 'success'
        );
        return redirect()->back()->with($notification);

    }  // DeleteBlogCategory

    public function BlogDetails($id){
        $blog = BlogPost::where('id',$id)->first();
        $tags = $blog->post_tags;
        $exploded_tags = explode(',',$tags);
        $blog_category = BlogCategory::latest()->orderBy('id', 'desc')->get();
        $recent_post = BlogPost::latest()->limit(3)->get();
        return view('frontend.blog.blog_details',compact('blog','exploded_tags','blog_category','recent_post'));
    }

    public function BlogCategoryList($id){
        $blogs = BlogPost::where('blog_cat_id',$id)->get();
        $blog_category = BlogCategory::latest()->orderBy('id', 'desc')->get();
        $recent_post = BlogPost::latest()->limit(3)->get();
        $breadcrumb = BlogCategory::where('id',$id)->first();
        return view('frontend.blog.blog_category_list',compact('blogs','blog_category','recent_post','breadcrumb'));
    }

    public function BlogList(){
        $blogs = BlogPost::latest()->get();
        $blog_category = BlogCategory::latest()->orderBy('id', 'desc')->get();
        $recent_post = BlogPost::latest()->limit(3)->get();
        return view('frontend.blog.blog_list',compact('blogs','blog_category','recent_post'));
    }

    public function StoreComment(Request $request){
        $post_id = $request->post_id;
        
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {
            Comment::insert([
                'user_id' => Auth::user()->id,
                'post_id' => $post_id,
                'parent_id' => null,
                'subject' => $request->subject,
                'message' => $request->message,
                'created_at' => Carbon::now()
            ]);


            $notification = array(
                'message' => 'Comment Created successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->back()->with($notification);

            // all good
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

    public function AdminBlogComment(){
        $comment = Comment::where('parent_id',null)->latest()->get();
        return view('backend.comment.comment_all',compact('comment'));
    }

    public function AdminCommentReply($id){
        $comment = Comment::where('id',$id)->first();
        return view('backend.comment.comment_reply',compact('comment'));
    }

    public function AdminReplyStoreComment(Request $request){
        $id = $request->id;
        $user_id = $request->user_id;
        $post_id = $request->post_id;
        $notification = array(
            'message' => 'Something Went Wrong!!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {
            Comment::insert([
                'user_id' => $user_id,
                'post_id' => $post_id,
                'parent_id' => $id,
                'subject' => $request->subject,
                'message' => $request->message,
                'created_at' => Carbon::now()
            ]);


            $notification = array(
                'message' => 'Comment Replied successfully!!',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->back()->with($notification);

            // all good
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
}