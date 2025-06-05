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
      $roomtypes = Roomtype::all();
      $rooms = Room::all();   
      return view("website.index", compact('rooms', 'roomtypes'));
    }
}
