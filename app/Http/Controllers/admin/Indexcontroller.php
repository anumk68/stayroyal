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

    public function login_submit(Request $request){
      $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('admin')->attempt($credentials)) {   
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
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


    public function index(){  
      $reviews = Review::all();
      $rooms = Room::all();
      $blogs = Blog::all();
      $bookings = Booking::all();
      $enquiries = Enquiry::where('Is_subscribe', 0)->get();
      $subscribers = Enquiry::where('Is_subscribe', 1)->get();
      return view("admin.index", compact('rooms', 'blogs', 'bookings','enquiries','subscribers','reviews'));
    }

    public function meta_setting(Request $request){
       $metadatas = Meta::join('metatypes', 'metas.meta_type_id', '=', 'metatypes.id')
        ->select('metas.*', 'metatypes.meta_name')
       ->get();   
      $datas = Metatype::all();  
      return view('admin.setting.index', compact('datas','metadatas'));
    }

    public function metatag_store(Request $request)
    {   
        $validated = $request->validate([
            'meta_title' => 'required',
            'value' => 'required|string|max:255',
            'meta_type_id' => 'required|numeric',
         ]);
        meta::create($validated);
        return back();
    }
}
