<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Roomtype;

class HomeController extends Controller
{ 
    public function index(){
        $roomtypes = Room::join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
        ->select('rooms.*', 'roomtypes.room_type')
       ->get();  
      $rooms = Room::all();   
      return view("website.index", compact('rooms', 'roomtypes'));
    }
}
