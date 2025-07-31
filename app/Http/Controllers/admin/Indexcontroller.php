<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Metatype;
use App\Models\Meta;
use App\Models\Enquiry;
use App\Models\Review;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class Indexcontroller extends Controller
{ 

    public function login(){
        return view('admin.login');
    }
      public function frontlogin(){
        return view('website.login');
    }
        public function frontregister(){
        return view('website.registration');
    }
  public function login_submit(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();
        $user = Auth::user();
        
    
        if ($user->role === 'user') {
            return redirect()->intended(route('home'));
        } else {
             
            return redirect()->route('dashboard');
        }
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}


    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function adminindex(){  
      $reviews = Review::all();
      $rooms = Room::with('roomType')->get();
      
      // $rooms = Room::all(); // IGNORE THIS LINE
      $blogs = Blog::all();
      $bookings = Booking::all();
      $enquiries = Enquiry::where('Is_subscribe', 0)->get();
      $subscribers = Enquiry::where('Is_subscribe', 1)->get();
      return view("admin.index", compact('rooms', 'blogs', 'bookings','enquiries','subscribers','reviews'));
    }

    public function meta_setting(){
       $metadatas = Meta::get();  
      return view('admin.setting.index', compact('metadatas'));
    }

    public function metatag_store(Request $request)
    {   
        $validated = $request->validate([
            'meta_title' => 'required',
            'value' => 'required|string|max:255',
            'meta_type_id' => 'required',
         ]);
        meta::create($validated);
        return back();
    }

      public function metatag_edit($id){
       $metadatas = Meta::find($id);  
      return view('admin.setting.edit', compact('metadatas'));
    }
    public function metadestroy($id) {
    $metadata = Meta::findOrFail($id);
    $metadata->delete();
    return redirect()->back()->with('status', 'Meta tag deleted successfully.');
}

public function metatag_update(Request $request, $id)
{
  
    $validated = $request->validate([
        'meta_title' => 'required',
        'value' => 'required|string|max:255',
        'meta_type_id' => 'required',
    ]);

    $meta = meta::findOrFail($id);
    $meta->update($validated);

    return redirect()->route('setting')->with('success', 'Meta tag updated successfully.');
}

 

}
