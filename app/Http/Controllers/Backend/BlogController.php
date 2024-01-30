<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function AllBlogCategory(){
        $blog_category = BlogCategory::latest()->get();
        return view('backend.category.blog_category',compact('blog_category'));
    } //end method
}
