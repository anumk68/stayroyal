<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogcategory;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
  public function view_blogs()
  {
     $blogs = Blog::with('category')->latest()->get();
    return view('admin.blogs.index', compact('blogs'));
    
  }


  public function blogcreate()
  {
    $categories = Blogcategory::all();
    return view('admin.blogs.create', compact('categories'));
  }

  // Show the edit form
  public function edit($id)
  {
    $blog = Blog::findOrFail($id);
    $categories = Blogcategory::all();

    return view('admin.blogs.edit', compact('blog', 'categories'));
  }

  // Update the existing blog
  public function blogupdate(Request $request, $id)
  {
    $blog = Blog::findOrFail($id);

    $request->validate([
      'title' => 'required|string|max:255',
      'slug' => 'required|string|max:255',
      'category_id' => 'required',
      'description' => 'required',
      'image_alt' => 'nullable|string|max:255',
      'image' => 'nullable',
      'meta_image' => 'nullable',
    ]);

    $data = $request->only([
      'title',
      'slug',
      'category_id',
      'description',
      'short_description',
      'meta_title',
      'meta_description',
      'meta_keyword',
      'image_alt',
    ]);

    // Replace image if uploaded
    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('blogs/images', 'public');
      $data['image'] = $imagePath;
    }

    // Replace meta_image if uploaded
    if ($request->hasFile('meta_image')) {
      $metaImagePath = $request->file('meta_image')->store('blogs/meta', 'public');
      $data['meta_image'] = $metaImagePath;
    }

    $blog->update($data);

    return redirect()->route('blogs.index')->with('status', 'Blog updated successfully.');
  }

  // Delete the blog
  public function blogdestroy($id)
  {
    $blog = Blog::findOrFail($id);
    $blog->delete();

    return redirect()->route('blogs.index')->with('status', 'Blog deleted successfully.');
  }

  /**
   * Store a new blog post.
   */
  public function blogstore(Request $request)
  {
    // Validate the incoming data
    $request->validate([
      'title' => 'required|string|max:255',
      'slug' => 'required|string|max:255|unique:blogs,slug',
      'category_id' => 'required',
      'description' => 'required',
      'image_alt' => 'required|string|max:255',
      'image' => 'image',
      'meta_image' => 'image',
    ]);

    // Prepare data
    $data = $request->only([
      'title',
      'slug',
      'category_id',
      'description',
      'short_description',
      'meta_title',
      'meta_description',
      'meta_keyword',
      'image_alt',
    ]);

    // Handle image uploads
    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('blogs/images', 'public');
      $data['image'] = $imagePath;
    }

    if ($request->hasFile('meta_image')) {
      $metaImagePath = $request->file('meta_image')->store('blogs/meta', 'public');
      $data['meta_image'] = $metaImagePath;
    }

    // Save the blog
    $blog = Blog::create($data);

    return redirect()->route('blogs.index')->with('status', 'Blog added successfully.');
  }


  public function category_store(Request $request)
  {
    $validated = $request->validate([
      'category_name' => 'required|string|max:255',
    ]);
    Blogcategory::create($validated);
    return back();
  }
  public function category_delete(Request $request, $id)
  {
    $room = Blogcategory::findOrFail($id);
    $room->delete();
    return redirect()->route('blogscategory')->with('success', 'Delete successfully.');
  }


  public function view_category()
  {
    $categories = Blogcategory::all();
    return view("admin.blogs.view_category", compact('categories'));
  }

 public function blog_details($slug)
 {
    $blog = Blog::where('slug', $slug)->firstOrFail();
    $recentBlogs = Blog::latest()->take(6)->get(); // Fetch some recent blogs for sidebar
    return view('website.blog-details', compact('blog', 'recentBlogs'));
  }
}
