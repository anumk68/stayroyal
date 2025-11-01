<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Booking;
use App\Models\FAQ;
use App\Models\Meta;
use App\Models\Offer;
use App\Models\Payment;
use App\Models\Room;
use App\Models\Roomtype;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    private $merchant_id;
    private $access_code;
    private $working_key;

    public function __construct()
    {
        $this->merchant_id = env('CCAVENUE_MERCHANT_ID');
        $this->access_code = env('CCAVENUE_ACCESS_CODE');
        $this->working_key = env('CCAVENUE_WORKING_KEY');
    }

    private function encryptCCAvenue($plainText, $key)
    {
        $blockSize = 16;
        $pad       = $blockSize - (strlen($plainText) % $blockSize);
        $plainText .= str_repeat(chr($pad), $pad);

        $encrypted = openssl_encrypt($plainText, 'AES-128-CBC', pack('H*', $key), OPENSSL_RAW_DATA, pack('H*', $key));
        return bin2hex($encrypted);
    }
    public function ccavenueResponse(Request $request)
    {
        $encResp   = $request->encResp;
        $decrypted = $this->decryptCCAvenue($encResp, env('CCAVENUE_WORKING_KEY'));
        parse_str($decrypted, $responseData);
        $orderId       = $responseData['order_id'];
        $transactionId = $responseData['tracking_id'];
        $status        = $responseData['order_status'];
        $payment       = Payment::where('status', 'pending')
            ->where('order_id', $orderId)
            ->first();

        if ($payment) {
            $payment->update([
                'transaction_id' => $transactionId,
                'status'         => $status === 'Success' ? 'paid' : 'failed',
                'paid_at'        => $status === 'Success' ? now() : null,
            ]);
            if ($status === 'Success' && session('booking_data')) {
                Booking::create([
                    'user_id'    => $payment->user_id,
                    'room_type'  => $payment->room_id,
                    'start_date' => session('booking_data.start_date'),
                    'end_date'   => session('booking_data.end_date'),
                    // etc.
                ]);
            }
        }

        return view('website.payment_status', ['status' => $status]);
    }

    private function decryptCCAvenue($encText, $key)
    {
        $encText   = hex2bin($encText);
        $decrypted = openssl_decrypt($encText, 'AES-128-CBC', pack('H*', $key), OPENSSL_RAW_DATA, pack('H*', $key));
        $pad       = ord($decrypted[strlen($decrypted) - 1]);
        return substr($decrypted, 0, -$pad);
    }

    public function index()
    {
        $rooms = Room::with('roomType')->where('status', 1)->get();

        $data      = session('booking_data', []);
        $startDate = isset($data['start_date']) ? date('Y-m-d', strtotime($data['start_date'])) : null;
        $endDate   = isset($data['end_date']) ? date('Y-m-d', strtotime($data['end_date'])) : null;

        // Check booking status dynamically for each room
        foreach ($rooms as $room) {
            $room->is_booked = false;

            if ($startDate && $endDate) {
                $room->is_booked = Booking::where('room_id', $room->id)
                    ->where(function ($query) use ($startDate, $endDate) {
                        $query->where('start_date', '<=', $endDate)
                            ->where('end_date', '>=', $startDate);
                    })
                    ->exists();
            }
        }

        // Fetch offers
        $weekOffers = Offer::with('roomType', 'room')->where('offer_valid_time', '1 week')->where('status', 1)->get();
        foreach ($weekOffers as $offer) {
            $room           = Room::where('room_type', $offer->room_type_id)->where('status', 1)->first();
            $offer->room_id = $room?->id;
        }

        $fifteenDayOffers = Offer::with('roomType')->where('offer_valid_time', '15 days')->where('status', 1)->get();
        foreach ($fifteenDayOffers as $offer) {
            $room           = Room::where('room_type', $offer->room_type_id)->where('status', 1)->first();
            $offer->room_id = $room?->id;
        }

        $thirtyDayOffers = Offer::with('roomType')->where('offer_valid_time', '30 days')->where('status', 1)->get();
        foreach ($thirtyDayOffers as $offer) {
            $room           = Room::where('room_type', $offer->room_type_id)->where('status', 1)->first();
            $offer->room_id = $room?->id;
        }

        $metatitle       = Meta::where('meta_title', 'title_rooms')->value('value');
        $metaDescription = Meta::where('meta_title', 'description_rooms')->value('value');
        return view("website.room", compact('rooms', 'weekOffers', 'fifteenDayOffers', 'thirtyDayOffers', 'metatitle', 'metaDescription'));
    }

    public function booking_review(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after:start_date',
            'room_type'  => 'required',
            'total_days' => 'required',
        ]);
        session(['booking_data' => $validated]);
        return redirect()->route('rooms', ['id' => $validated['room_type']]);
    }
    public function room_detail(Request $request, $slug, $offer_id = null)
    {
        $rooms      = null;
        $offer      = null;
        $weekOffers = collect();
        $details    = Room::join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
            ->select('rooms.*', 'roomtypes.room_type')
            ->where('rooms.slug', $slug)
            ->first();
        if ($details) {
            if (is_null($offer_id)) {
                $rooms = Room::with('roomType')
                    ->where('status', 1)
                    ->get();
            } else {

                $offer = Offer::where('slug', $offer_id)
                    ->where('status', 1)
                    ->first();

                $weekOffers = Offer::where('slug', '!=', $offer_id)
                    ->with('roomType')
                    ->where('status', 1)
                    ->get();
            }

            $roomid       = Room::where('slug', $slug)->first();
            $room_type_id = $roomid->room_type ?? null;
            $roomtypes    = Roomtype::with('rooms')->get();
            $data         = session('booking_data', [
                'start_date' => '',
                'end_date'   => '',
                'room_type'  => '',
                'total_days' => '',
            ]);

            if ($offer_id == null) {
                $metatitle       = Meta::where('meta_title', 'title-' . $details->slug)->value('value');
                $metaDescription = Meta::where('meta_title', 'description-' . $details->slug)->value('value');
            } else {
                $metatitle       = Meta::where('meta_title', 'title-' . $details->slug . '/' . $offer_id)->value('value');
                $metaDescription = Meta::where('meta_title', 'description-' . $details->slug . '/' . $offer_id)->value('value');
            }
           

            $faqs = FAQ::where('room_id', $details->id)->where('status', 1)->get();
            // dd($faq);
            return view('website.ground-floor', compact(
                'details',
                'roomtypes',
                'data',
                'rooms',
                'offer',
                'metatitle',
                'metaDescription',
                'weekOffers',
                'faqs'
            ));
        } else {
            return redirect()->back();
            // return redirect()->route('home');
        }
    }

    public function user_details(Request $request)
    {
        if (! Auth::check()) {
            return back()->with('must_login', 'You need to login or register before booking.');
        }

        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after:start_date',
            'room_type'  => 'required', // this is actually room_id
            'total_days' => 'nullable',
            'price'      => 'required',
        ]);

        $start = Carbon::parse($request->start_date);
        $end   = Carbon::parse($request->end_date);

        $isBooked = Booking::where('room_id', $request->room_id)
            ->where(function ($query) use ($start, $end) {
                $query->where('start_date', '<', $end)
                    ->where('end_date', '>', $start);
            })
            ->exists();
        $available_date    = Booking::where('room_id', $request->room_id)->orderby('created_at', 'desc')->first();
        $nextAvailableDate = Carbon::parse($available_date->end_date)->addDay()->format('d M Y');
        if ($isBooked) {
            return back()->withErrors([
                'booking_error' => 'This room is not available for the selected dates. <span style="color: green;">Available starting - ' . $nextAvailableDate . '</span>',
            ])->withInput();
        }

        $user     = Auth::user();
        $order_id = uniqid('BOOK_');
        $amount   = $request->price;

        // Save Booking
        $startDate = Carbon::parse($request->start_date);
        $endDate   = Carbon::parse($request->end_date);
        $totalDays = $startDate->diffInDays($endDate);
        $totalDays = max(1, $totalDays);

        $booking = Booking::create([
            'user_id'    => $user->id,
            'room_id'    => $request->room_id,
            'room_type'  => $request->room_type,
            'location'   => '', // Optional: fill if you have this info
            'size'       => '', // Optional: fill if you have this info
            'price'      => $amount,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'total_days' => $request->total_days ?? $totalDays ?? '',
            'adults'     => $request->adults,
            'children'   => $request->children,
            'infants'    => $request->infants,
            'extra_beds' => $request->extra_beds,

        ]);

        // Save Payment
        $payment = Payment::create([
            'user_id'        => $user->id,
            'room_id'        => $request->room_id,
            'amount'         => $amount,
            'currency'       => 'INR',
            'payment_method' => 'ccavenue',
            'status'         => 'pending',
            'order_id'       => $order_id,
        ]);

        // Store booking ID in session (optional, for success page)
        session(['booking_id' => $booking->id]);

        // Payment Gateway Setup
        $merchant_id = env('CCAVENUE_MERCHANT_ID');
        $access_code = env('CCAVENUE_ACCESS_CODE');
        $working_key = env('CCAVENUE_WORKING_KEY');

        $postData = http_build_query([
            'merchant_id'   => $merchant_id,
            'order_id'      => $order_id,
            'currency'      => 'INR',
            'amount'        => $amount,
            'redirect_url'  => route('ccavenue.response'),
            'cancel_url'    => route('ccavenue.response'),
            'language'      => 'EN',
            'billing_name'  => $user->user_name,
            'billing_email' => $user->email,
            'billing_tel'   => $user->phone,
        ]);

        $encRequest = $this->encryptCCAvenue($postData, $working_key);

        return view('website.payments', compact('encRequest', 'access_code'));
    }

    public function show_user_form($id)
    {
        $data    = session('booking_data');
        $details = Room::join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
            ->where('rooms.room_type', '=', $data['room_type'])
            ->select('rooms.*', 'roomtypes.room_type')
            ->first();
        $data['location'] = $details->location;
        $data['price']    = $details->price;
        $data['room_id']  = $details->id;
        session(['booking_data' => $data]);
        // $details = Room::find($id);
        return view('website.registration', compact('details', 'data'));
    }

    public function user_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|min:4|max:20|regex:/^[A-Za-z ]+$/',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'required|numeric|digits:10',
            'address'   => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        // Register user
        User::create([
            'user_name' => $request->user_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'address'   => $request->address,
            'role'   => 'user',
            'status'   => '1',
            'email_verified_at'   => now(),
            'password'  => Hash::make($request->password),
        ]);
        return redirect()->route('user.login')->with('success', 'Your account has been created. Please log in.');
    }
    public function user_login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $bookingData            = session('booking_data', []);
            $bookingData['user_id'] = $user->id;
            session(['booking_data' => $bookingData]);
            Auth::login($user);
            $user->name;
            $user->email;
            $user->phone;
            $request->session()->regenerate();
            $order_id = uniqid();
            $data     = [
                'merchant_id'   => $this->merchant_id,
                'order_id'      => $order_id,
                'currency'      => 'INR',
                'amount'        => '500',
                'redirect_url'  => 'http://localhost/hotel_booking/payment/response',
                'cancel_url'    => 'http://localhost/hotel_booking/payment/response',
                'language'      => 'EN',
                'billing_name'  => $user->user_name,
                'billing_email' => $user->email,
                'billing_tel'   => $user->phone,
            ];

            $merchant_data = http_build_query($data);
            $encRequest    = $this->encrypt($merchant_data, $this->working_key);
            return view('website.payments', [
                'encRequest' => $encRequest,
                'accessCode' => $this->access_code,
            ]);
            // return redirect()->route('payment')->with('success', 'User login successfully!');
        }
        return back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput()
            ->with('show_login', true);
    }

    public function paymentResponse(Request $request)
    {
        $encResp   = $request->input('encResp');
        $decrypted = $this->decryptCCAvenue($encResp, $this->working_key);
        parse_str($decrypted, $output);

        $status     = $output['order_status'] ?? null;
        $trackingId = $output['tracking_id'] ?? null;
        $orderId    = $output['order_id'] ?? null;

        if ($status === 'Success') {
            $data = session('booking_data');

            if (! $data) {
                return "⚠️ Booking data not found in session.";
            }

            // Avoid duplicate entries if already paid
            $existing = Payment::where('order_id', $orderId)->first();
            if ($existing) {
                return "ℹ️ Payment already recorded. Tracking ID: " . $trackingId;
            }

            // Save payment
            $payment = Payment::create([
                'user_id'        => $data['user_id'],
                'room_id'        => $data['room_id'],
                'amount'         => $data['price'],
                'order_id'       => $orderId,
                'transaction_id' => $trackingId,
                'payment_method' => 'ccavenue',
                'currency'       => 'INR',
                'status'         => 'paid',
                'paid_at'        => now(),
            ]);

            // Save booking
            $booking = Booking::create([
                'user_id'    => $data['user_id'],
                'room_id'    => $data['room_id'],
                'room_type'  => $data['room_type'] ?? '',
                'start_date' => $data['start_date'],
                'end_date'   => $data['end_date'],
                'total_days' => $data['total_days'],
                'price'      => $data['price'],
                'location'   => $data['location'] ?? '',
                'size'       => '1BHK', // or get dynamically if needed
            ]);

            // Send Email
            $user      = User::find($data['user_id']);
            $emailData = Booking::join('roomtypes', 'bookings.room_type', '=', 'roomtypes.id')
                ->where('bookings.id', $booking->id)
                ->select('bookings.*', 'roomtypes.room_type')
                ->first();

            if ($user && $emailData) {
                Mail::to($user->email)->send(new WelcomeMail($emailData));
            }

            session()->forget('booking_data'); // clear session
            return "✅ Payment Success. Tracking ID: $trackingId";
        }

        return "❌ Payment Failed or Cancelled.";
    }
}
