<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Roomtype;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
     public function index(){
      $rooms = Room::all();
      return view("website.room", compact('rooms'));
    }
     
    public function show(){
      return view('website.room');
    }
      
    public function booking_review(Request $request){ 
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'room_type' => 'required',
            'total_days' => 'required',
        ]);  
       session(['booking_data' => $validated]);
       return redirect()->route('roomdetails', ['id' => $validated['room_type']]);
     }


      public function room_detail(Request $request, $id){  
       //session()->forget('booking_data');
       $details = Room::find($id); 
       $roomtypes = Roomtype::all();  
       $data = session('booking_data', []); 
       if (empty($data)) {  
          $data = session('booking_data', [
          'start_date' => '',
          'end_date' => '',
          'room_type' => '',
          'total_days' => '',
          ]);
          return view('website.delux-family-rooms', compact('details','roomtypes','data'));
        } 
        return view('website.delux-family-rooms', compact('data', 'details', 'roomtypes'));
      }

      
     
     public function user_details(Request $request){ 
      $validated = $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'room_type' => 'required',
        'total_days' => 'required',
      ]);
      
       // ✅ Overwrite session with updated data
       session(['booking_data' => $validated]); // ✅ Save to session
       $data = session('booking_data');         // ✅ Retrieve from session
       $details = Room::find($request->id); 
       return view('website.registration', compact('details','data'));
     }

     public function user_register(Request $request){  
       $validator = Validator::make($request->all(), [
        'user_name' => 'required|string|min:4|max:20',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required',
        'address' => 'required|min:5',
       ]);
       if ($validator->fails()) { 
        return back()
            ->withErrors($validator) 
            ->withInput();
      } 
       User::create([
        'user_name' => $request->user_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
      ]);
      return redirect()->route('payment')->with('success', 'User information saved successfully!');
     } 


     public function user_login(Request $request){    
       $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
         ]);  
        if (Auth::attempt($credentials)) { 
         $request->session()->regenerate();
          return redirect()->intended(route('user.dashboard'));
     }   
      return redirect()->route('payment')->with('success', 'login Successfully');
      //    return back()->withErrors([
      //    'email' => 'The provided credentials do not match our records.',
      // ])->withInput();
      }

     public function payment(){
       return view('website.payments');
     }

     public function booking(Request $request){   dd($request->all());

     }
}
