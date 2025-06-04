<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class HomeController extends Controller
{ 
    public function index(){
      $rooms = Room::all();   
      return view("website.index", compact('rooms'));
    }
}
