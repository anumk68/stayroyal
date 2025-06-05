<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Roomtype;
use Illuminate\Support\Facades\Validator;

class RoomsController extends Controller
{
     public function view_rooms(){
       $roomtypes = Roomtype::all();
       $rooms = Room::all();
       return view("admin.rooms.index", compact('rooms','roomtypes'));
     }
     
    public function room_delete(Request $request, $id)
    {
        $room = Room::findOrFail($id); 
        $room->delete();
        return redirect()->route('adminroom')->with('success', 'Room deleted successfully.');
    }
    public function view_booking_list(){
       $bookings = Booking::all();
       return view("admin.rooms.booking", compact('bookings'));
}
  
       public function booking_delete(Request $request, $id) {
        $room = Booking::findOrFail($id); 
        $room->delete();
        return redirect()->route('bookinglist')->with('success', 'Booking deleted successfully.');
    }


     public function store(Request $request)
    {
        try {
        $validated = $request->validate([
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'size' => 'required|numeric|min:0',
            'room_type' => 'required|string',
            'room_image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
         } catch (\Illuminate\Validation\ValidationException $e) {
         dd($e->errors()); // This will show exactly what's failing
        }
         if ($request->hasFile('room_image')) {
        $imagePath = $request->file('room_image')->store('image', 'public');
          }
         Room::create([
        'price' => $validated['price'],
        'location' => $validated['location'],
        'size' => $validated['size'], // Assuming your DB column is category_id
        'room_type' => $validated['room_type'], 
        'room_image' => $imagePath ?? null,
     ]);
        return back()->with('success', 'Room  Add successfully!');
    }

    public function edit($id)
    {     
       $rooms = Room::findOrFail($id); 
        return view('admin.rooms.edit', compact('rooms'));
    }

    public function room_edit(Request $request){
    try {
          $validated = $request->validate([
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'size' => 'required|numeric|min:0',
            'room_type' => 'required|string',
            'room_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
      } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors()); 
      }
     $room = Room::findOrFail($request->id);
        if ($request->hasFile('room_image')) {
         $imagePath = $request->file('room_image')->store('image', 'public');
        $room->room_image = $imagePath;
     }
    $room->price = $validated['price'];
    $room->location = $validated['location'];
    $room->size = $validated['size'];
    $room->room_type = $validated['room_type'];
    $room->save();
    return redirect()->route('adminroom')->with('success', 'Room updated successfully!');
    }

    public function view_room_type(){
      $roomtypes = Roomtype::all();
      return view('admin.roomType.index', compact('roomtypes'));
    }

    public function room_type(Request $request){ 
      $validator = Validator::make($request->all(), [
        'room_type' => 'required|string|max:255|min:4',
        ]);
        if ($validator->fails()) { 
        return back()
            ->withErrors($validator) 
            ->withInput();
       } 
        Roomtype::create([
        'room_type' => $request->room_type,
       ]);
        return back()->with('success', 'Room Type Add Sucessfully');
    }

    public function roomtype_delete(Request $request, $id){
        $roomtype = Roomtype::findOrFail($id); 
        $roomtype->delete();
        return redirect()->route('adminroomtype')->with('success', 'Delete successfully.');
    }
}