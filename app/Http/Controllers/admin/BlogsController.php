<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogcategory;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function view_blogs(){
      $categories = Blogcategory::all();
       $blogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')
        ->select('blogs.*', 'blogcategories.category_name')
       ->get(); 
       return view("admin.blogs.index", compact('blogs', 'categories'));
    }
     public function view_category(){
       $categories = Blogcategory::all();
       return view("admin.blogs.view_category", compact('categories'));
    }
    public function category_delete(Request $request, $id)
    {
        $room = Blogcategory::findOrFail($id); 
        $room->delete();
        return redirect()->route('blogscategory')->with('success', 'Delete successfully.');
    }
    public function blog_store(Request $request){  
    try {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'category_id' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
      dd($e->errors()); // This will show exactly what's failing
    }
         
    // Handle file upload
     if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('image', 'public');
     }

     Blog::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'category_id' => $validated['category_id'], // Assuming your DB column is category_id
        'image' => $imagePath ?? null,
     ]);
     return back()->with('success', 'Blog post created successfully!');
   }

   public function blog_delete(Request $request, $id)
    {
        $room = Blog::findOrFail($id); 
        $room->delete();
        return redirect()->route('adminblogs')->with('success', 'Delete successfully.');
    }

    public function edit(Request $request, $id)  {  dd("welcome");
        $blog = Blog::find($request->id);

        // Return blog data as JSON (you can customize fields if needed)
        return response()->json($blog);
    }

     public function category_store(Request $request){
          $validated = $request->validate([
            'category_name' => 'required|string|max:255',
         ]);
        Blogcategory::create($validated);
        return back();
    }

    public function blog_edit(Request $request, $id){   
     $blogs = Blog::findOrFail($id);
     $categories = Blogcategory::all();
     return view('admin.blogs.edit', compact('blogs','categories'));
   }

         public function blog_update(Request $request){ 
         try {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:blogcategories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors()); // Optional: Show validation errors
    }
       $blog = Blog::findOrFail($request->id);
      if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('image', 'public');
        $blog->image = $imagePath;
       }

        $blog->title = $validated['title'];
        $blog->description = $validated['description'];
        $blog->category_id = $validated['category_id'];
        $blog->save();
     return redirect()->route('adminblogs')->with('success', 'Blog updated successfully!');
     }

}
