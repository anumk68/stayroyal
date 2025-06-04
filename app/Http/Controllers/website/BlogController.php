<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
     public function index(){
     $blogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')
        ->select('blogs.*', 'blogcategories.category_name')
       ->get(); 
      return view("website.blog", compact('blogs'));
    }
}
