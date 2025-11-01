<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscription;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Log;

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

    public function payment_delete(Request $request, $id){
         $payments = Payment::findOrFail($id); 
        $payments->delete();
        return redirect()->route('adminpayment')->with('success', 'Payment deleted successfully.');
     }
public function subscribe(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:subscriptions,email',
    ]);

    try {
        $subscription = Subscription::create([
            'email' => $request->email,
            'is_subscribe' => $request->is_subscribe ?? 1,
        ]);

        // Send confirmation email
        Mail::send('emails.subscription-confirmation', ['email' => $subscription->email], function ($message) use ($subscription) {
            $message->to($subscription->email)
                    ->subject('Thanks for subscribing to our newsletter');
        });

        // ✅ Return proper JSON
        return response()->json([
            'status' => true,
            'message' => 'Thank you for subscribing! Please check your inbox.'
        ]);

    } catch (\Exception $e) {
        Log::error('Subscription failed: ' . $e->getMessage());

        // Return JSON error with 500 code
        return response()->json([
            'status' => false,
            'message' => 'Something went wrong while subscribing. Please try again later.'
        ], 500);
    }
}




  public function enquery(Request $request)
{
    $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|unique:enquiries,email', // fixed typo: "uniqe" to "unique"
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    try {
        // Save enquiry
        $enquiry = Enquiry::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Send mail to user
        Mail::send('emails.enquiry-notification', ['enquiry' => $enquiry], function ($message) use ($enquiry) {
            $message->to($enquiry->email)
                    ->subject('Your enquiry has been received');
        });

        // Send mail to admin
        Mail::send('emails.enquiry-notification-admin', ['enquiry' => $enquiry], function ($message) {
            $message->to('contact@stayroyal.in')
                    ->subject('New enquiry received');
        });

        return back()->with('status', 'Your enquiry has been sent successfully. We’ll get back to you shortly.');
    } catch (\Exception $e) {
        // You can log the error if needed
        Log::error('Enquiry failed: ' . $e->getMessage());

        return back()->with('error', 'Something went wrong. Please try again later.');
    }
}

}
