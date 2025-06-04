<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function user_enquery(Request $request){
    //     $validator = Validator::make($request->all(), [
    //     'name' => 'required|string|min:4|max:20',
    //     'email' => 'required|email',
    //     'subject' => 'required',
    //     'message' => 'required|string|min:20',
    //   ]);
    //  if ($validator->fails()) {  
    //     return response()->json([
    //         'success' => false,
    //         'errors' => $validator->errors()
    //     ], 422);
    // }
  
      Enquiry::create([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
      ]);

    // Return success response
    return response()->json([
        'success' => true,
        'message' => 'Enquiry submitted and saved successfully!'
     ]);
     }
          

    }

