<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Models\Blog;
use App\Models\Room;
use App\Models\Offer;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

class UserController extends Controller
{
  public function user_enquiry(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|min:4|max:20|regex:/^[A-Za-z ]+$/',
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


  public function user_subscribe(Request $request)
  {
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

  public function user_booking()
  {
    // $booking_details = Booking::where('user_id', Auth::id())->get();
    $booking_details = Booking::join('roomtypes', 'bookings.room_type', '=', 'roomtypes.id')
      ->where('bookings.user_id', Auth::id())
      ->select('bookings.*', 'roomtypes.room_type')
      ->get();
    return view('website.booking', compact('booking_details'));
  }

  public function download_booking_details($id)
  {
    $booking = Booking::join('roomtypes', 'bookings.room_type', '=', 'roomtypes.id')
      ->where('bookings.id', $id)
      ->select('bookings.*', 'roomtypes.room_type')
      ->firstOrFail();
    $user = auth()->user();
    $pdf = FacadePdf::loadView('website.download-booking', compact('booking', 'user'));
    return $pdf->download('booking_' . $booking->id . '.pdf');
  }

  public function user_profile()
  {
    $user_details = User::where('id', Auth::id())->first();
    return view('website.user_profile', compact('user_details'));
  }

  public function update_profile(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'user_name' => 'required|regex:/^[a-zA-Z\s]+$/|min:3|max:50', // only letters and spaces
      'email' => 'required|email|unique:users,email,' . $request->id,
      'phone' => 'required|digits_between:7,15', // only numeric and between 7 to 15 digits
      'address' => 'required|string|max:255',
    ]);
    if ($validator->fails()) {
      return back()
        ->withErrors($validator)
        ->withInput();
    }
    $user = User::findOrFail($request->id);
    $user->user_name = $request->user_name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->save();
    return back()->with('success', 'Profile updated successfully!');
  }

  public function logout(request $request)
  {
    Auth::logout(); // Logs the user out
    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate CSRF token
    return redirect()->route('user.login')->with('success', 'You have been logged out.');
  }
  //  ////////////     About us section    ////////
  public function view_about_us()
  {
    $metatitle = Meta::where('meta_title', 'title_about')->value('value');
    $metaDescription = Meta::where('meta_title', 'description_about')->value('value');
    return view("website.about", compact('metatitle', 'metaDescription'));
  }

  public function show_privacy_policy()
  {
    return view('website.privacy-policy');
  }
  public function show_refund_policy()
  {
    return view('website.refund-policy');
  }


  // ///////////      Blog Section   ////////
  public function view_blogs()
  {
$blogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')
    ->select('blogs.*', 'blogcategories.category_name')
    ->orderBy('blogs.id', 'desc')
    ->paginate(9);

    return view("website.blog", compact('blogs'));
  }


  //////////     contact section    ////////////////
  public function view_contact_detail()
  {
     $metatitle = Meta::where('meta_title', 'title_contact')->value('value');
    $metaDescription = Meta::where('meta_title', 'description_contact')->value('value');
    return view("website.contact" , compact('metatitle', 'metaDescription'));
  }

  ////////////     Home section     ////////////////
  public function index()
  {
    $roomtypes = Room::join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
      ->select('rooms.*', 'roomtypes.room_type')
      ->get();
    $weekOffers = Offer::with('roomType','room')
      ->where('offer_valid_time', '1 week')
      ->where('status', 1)
      ->get();

    foreach ($weekOffers as $offer) {
      $room = Room::where('room_type', $offer->room_type_id)->where('status', 1)->first();
      $offer->room_id = $room?->id;
    }

    // 15 Days Offers
    $fifteenDayOffers = Offer::with('roomType', 'room')
      ->where('offer_valid_time', '15 days')
      ->where('status', 1)
      ->get();

    foreach ($fifteenDayOffers as $offer) {
      $room = Room::where('room_type', $offer->room_type_id)->where('status', 1)->first();
      $offer->room_id = $room?->id;
    }

    // 30 Days Offers
    $thirtyDayOffers = Offer::with('roomType','room')
      ->where('offer_valid_time', '30 days')
      ->where('status', 1)
      ->get();

    foreach ($thirtyDayOffers as $offer) {
      $room = Room::where('room_type', $offer->room_type_id)->where('status', 1)->first();
      $offer->room_id = $room?->id;
    }
    $rooms = Room::all();
    $metatitle = Meta::where('meta_title', 'title_home')->value('value');
    $metaDescription = Meta::where('meta_title', 'description_home')->value('value');

    return view("website.index", compact('metatitle', 'metaDescription', 'rooms', 'roomtypes', 'weekOffers', 'fifteenDayOffers', 'thirtyDayOffers'));
  }

  public function termsconditions()
  {
    return view("website.terms-&-conditions");
  }
  public function account()
  {
    $user = Auth::user();
    $bookings = Booking::with('room')->where('user_id', $user->id)->get();
    return view('website.account', compact('user', 'bookings'));
  }


  // AccountController.php
  public function accountupdate(Request $request)
  {
    $user = Auth::user();
    $user->update($request->only(['user_name', 'email', 'phone']));
    return back()->with('status', 'Account updated successfully.');
  }

  public function errrorpage()
  {
    return view('website.404');
  }

}


