<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Roomtype;
use App\Models\User;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RoomController extends Controller
{
     public function index(){
      $rooms = Room::join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
        ->select('rooms.*', 'roomtypes.room_type')
       ->get(); 
      // $rooms = Room::all();
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
      //  $details = Room::find($id); 
      $rooms = Room::join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
        ->select('rooms.*', 'roomtypes.room_type')
       ->get(); 
      $details = Room::join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
      ->select('rooms.*', 'roomtypes.room_type')
      ->where('rooms.id', $id)
      ->first();
       $roomtypes = Roomtype::all();  
       $data = session('booking_data', []); 
       if (empty($data)) {  
          $data = session('booking_data', [
          'start_date' => '',
          'end_date' => '',
          'room_type' => '',
          'total_days' => '',
          ]);
          return view('website.ground-floor', compact('details','roomtypes','data','rooms'));
        } 
    ////     Check Date is available or not    ///////////
        // Step 5: Define default empty arrays
    $bookedRoomIds = [];
    $bookedRoomTypeIds = [];

    // Step 6: If valid date range exists, find booked rooms
    if (!empty($data['start_date']) && !empty($data['end_date'])) {
        // Clean date format
        $startDate = Carbon::parse($data['start_date'])->format('Y-m-d');
        $endDate = Carbon::parse($data['end_date'])->format('Y-m-d');

        // Query bookings that overlap the selected date range
        $bookedRoomIds = Booking::where(function ($query) use ($startDate, $endDate) {
            $query->where('start_date', '<', $endDate)
                ->where('end_date', '>', $startDate);
        })->pluck('room_id')->toArray();

        // Fetch room type IDs of those booked rooms
        $bookedRoomTypeIds = Room::whereIn('id', $bookedRoomIds)
            ->pluck('room_type')
            ->toArray();
    }
        return view('website.ground-floor', compact('data', 'details', 'roomtypes','rooms','bookedRoomIds'));
      }

      
     
     public function user_details(Request $request){ 
      // ✅ Step 1: Validate the input
    $validated = $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'room_type' => 'required',
        'total_days' => 'required',
    ]);
  // ✅ Step 2: Check if room is already booked
    $start = Carbon::parse($request->start_date); 
    $end = Carbon::parse($request->end_date); 

    $isBooked = Booking::where('room_type', $request->room_type)
        ->where(function ($query) use ($start, $end) {
            $query->whereBetween('start_date', [$start, $end])
                  ->orWhereBetween('end_date', [$start, $end])
                  ->orWhere(function ($q) use ($start, $end) {
                      $q->where('start_date', '<=', $start)
                        ->where('end_date', '>=', $end);
                  });
        })    
        ->exists(); 

    // ✅ Step 3: If booked, go back with error and keep old input
    if ($isBooked) { 
        return back()
            ->withErrors(['booking_error' => 'This Room not available for selected dates.'])
            ->withInput();
    }
  // ✅ Step 4: Save to session & redirect
    session(['booking_data' => $validated]);
    return redirect()->route('user.form', ['id' => $request->id]);

      // $validated = $request->validate([
      //   'start_date' => 'required|date',
      //   'end_date' => 'required|date|after:start_date',
      //   'room_type' => 'required',
      //   'total_days' => 'required',
      // ]);
      // session(['booking_data' => $validated]);
      // return redirect()->route('user.form', ['id' => $request->id]);
      
     }

     public function show_user_form($id){
      $data = session('booking_data'); 
       $details = Room::join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
       ->where('rooms.room_type', '=', $data['room_type'])
        ->select('rooms.*', 'roomtypes.room_type')
       ->first(); 
      // $details = Room::find($id);
      return view('website.registration', compact('details','data'));
     }

     public function user_register(Request $request){  
        $validator = Validator::make($request->all(), [
        'user_name' => 'required|string|min:4|max:20',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|numeric|digits_between:8,12',
        'address' => 'required|min:5',
       ]);
       if ($validator->fails()) { 
          return back()
            ->withErrors($validator) 
            ->withInput();
      } 
       $user = User::create([
        'user_name' => $request->user_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'password' => Hash::make('123456'),
      ]);
       $bookingData = session('booking_data', []); 
       $bookingData['user_id'] = $user->id;
       session(['booking_data' => $bookingData]);
      // $data = session('booking_data');
      return redirect()->route('payment')->with('success', 'User information saved successfully!');
     } 


     public function user_login(Request $request){  
      $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
       ]);
      // Find user by email
      $user = User::where('email', $credentials['email'])->first(); 

      if ($user && Hash::check($credentials['password'], $user->password)) {  
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('payment')->with('success', 'User login successfully!');
     }   
       return back()
       ->withErrors(['email' => 'The provided credentials do not match our records.'])
       ->withInput()
       ->with('show_login', true);  
     //  $credentials = $request->validate([
      //   'email' => ['required', 'email'],
      //   'password' => ['required'],
      //    ]);   
      //   if (Auth::attempt($credentials)) { dd("welcome");
      //    $request->session()->regenerate();
      //     return redirect()->intended(route('user.dashboard'));
      //  }   dd("wel");
      // return redirect()->route('payment')->with('success', 'login Successfully');
      //    return back()->withErrors([
      //    'email' => 'The provided credentials do not match our records.',
      // ])->withInput();
      }

     public function payment(){
      $data = session('booking_data');  
       return view('website.payments');
     }

     public function booking(Request $request){   
       $validator = Validator::make($request->all(), [
        'card_name' => 'required|string|min:4|max:15',
        'card_number' => 'required|min:12|max:16',
        'exp_month' => 'required',
        'exp_year' => 'required',
        'cvc' => 'required|min:3|max:6',
       ]);
       if ($validator->fails()) { 
        return back()
            ->withErrors($validator) 
            ->withInput();
      } 
      $data = session('booking_data'); 
      $payments = Payment::create([
        'user_id' => $data['user_id'] ?? null,
        'room_id' =>  '6',
        //  'room_id' => $data['room_type'] ?? null,
        'amount' =>  '1500',
        'payment_method' => $request->card_number,
      ]);  
      if($payments){
         $bookings = Booking::create([
           'user_id' => $data['user_id'] ?? null,
           'room_id' =>  '6',
           'room_type' => $data['room_type'],
           'start_date' => $data['start_date'],
           'total_days' => $data['total_days'],
           'end_date' => $data['end_date'] ?? null,
           'price' =>  '1500',
           'size' =>  '1BHK',
          'payment_method' => $request->card_number,
         ]); 
         return redirect('/')->with('success', 'Booking Successfully');
     }
      //  $bookingData = session('booking_data', []); 
      //  $bookingData['user_id'] = $user->id;
      //  session(['booking_data' => $bookingData]);
      // $data = session('booking_data');
      return redirect()->route('payment')->with('Error', 'Booking not confirm');
    }
}
