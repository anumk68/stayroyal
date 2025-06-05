<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Payment;
use App\Models\User;

class UsersController extends Controller
{
    public function customer_review(){
        // $review = User::all(); dd($review)
        $reviews = Review::join('users', 'reviews.user_id', '=', 'users.id')
        ->join('rooms', 'reviews.room_id', '=', 'rooms.id')
        ->select('reviews.*', 'users.user_name', 'rooms.room_type')
       ->get();  
        return view('admin.reviews.index', compact('reviews'));
    }

    public function customer_payment(){   
        // $payments = Payment::all(); 
         $payments = Payment::join('users', 'payments.user_id', '=', 'users.id')
        ->join('rooms', 'payments.room_id', '=', 'rooms.id')
        ->select('payments.*', 'users.user_name', 'rooms.room_type')
       ->get();  
        return view('admin.payments.index', compact('payments'));
    }
}
