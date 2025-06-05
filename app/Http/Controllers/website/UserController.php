<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function user_enquery(Request $request){   
       $validator = Validator::make($request->all(), [
        'name' => 'required|string|min:4|max:20',
        'email' => 'required|email|unique:enquiries,email',
        'subject' => 'required',
        'message' => 'required|string|min:20',
       ]);
        if ($validator->fails()) {
        return back()
            ->withErrors($validator) 
            ->withInput();
      } 
     Enquiry::create([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
      ]);
     return back()->with('success', 'Enquiry submitted and saved successfully!');
    }
     
          
    public function user_subscribe(Request $request){
        $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:enquiries,email',
    ]);
      if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput();
     }
     Enquiry::create([
        'email' => $request->input('email'),
        'Is_subscribe' => $request->input('Is_subscribe'), 
    ]);
    return back()->with('success', 'Thanks for subscribing!');
    }
    }

