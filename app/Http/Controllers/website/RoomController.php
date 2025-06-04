<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
class RoomController extends Controller
{
     public function index(){
      $rooms = Room::all();
      return view("website.room", compact('rooms'));
    }

    public function show(){
      return view('website.room');
    }

      public function room_detail($id){  
        $details = Room::find($id);  
        return view('website.delux-family-rooms', compact('details'));
      }
}
