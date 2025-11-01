<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
   use App\Models\Offer;
use App\Models\Room;
use App\Models\Roomtype;

class OfferController extends Controller
{


public function index()
{
    $offers = Offer::with('roomType')->get();
    return view('admin.offer.index', compact('offers'));
}
public function edit($id)
{
    $offer = Offer::findOrFail($id);
    $roomtypes = Roomtype::where('status', 0)->get();
    return view('admin.offer.edit', compact('offer', 'roomtypes'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'room_type_id' => 'required|exists:roomtypes,id',
        'offer_price' => 'required|numeric|min:1|max:100',
        'offer_valid_time' => 'required|string|max:100',
        'status' => 'required|boolean',
           'slug' => 'nullable|string',

    ]);

    // Fetch original offer
    $offer = Offer::findOrFail($id);

    // Get one room matching the room_type_id to retrieve price
    $room = Room::where('room_type', $request->room_type_id)->first();

    if (!$room) {
        return back()->with('error', 'No room found for selected room type.');
    }

    // Calculate after discount price
    $originalPrice = $room->price;
    $discount = $originalPrice * ($request->offer_price / 100);
    $afterDiscount = round($originalPrice - $discount);

    // Update offer
    $offer->room_type_id = $request->room_type_id;
    $offer->offer_price = $request->offer_price;
    $offer->offer_valid_time = $request->offer_valid_time;
    $offer->after_discount_price = $afterDiscount;
    $offer->status = $request->status;
    $offer->slug = $request->slug;
    $offer->save();

    return redirect()->route('admin.offers.index')->with('success', 'Offer updated successfully.');
}

public function create()
{
    $roomtypes = Roomtype::where('status', 0)->get();
    return view('admin.offer.create', compact('roomtypes'));
}

public function store(Request $request)
{
    $request->validate([
        'room_type_id' => 'required|exists:roomtypes,id',
        'offer_price' => 'required|numeric|min:0|max:100',
        'offer_valid_time' => 'required|string',
         'slug' => 'nullable',
    ]);

    $room = Room::where('room_type', $request->room_type_id)->first();
    $originalPrice = $room ? $room->price : 0;
    $discountedPrice = $originalPrice - ($originalPrice * $request->offer_price / 100);

    Offer::create([
        'room_type_id' => $request->room_type_id,
        'offer_price' => $request->offer_price,
        'offer_valid_time' => $request->offer_valid_time,
        'after_discount_price' => $discountedPrice,
        'status' => $request->status ?? 1,
        'slug' => $request->slug,
    ]);

    return redirect()->route('admin.offers.index')->with('success', 'Offer created successfully');
}

public function destroy($id)
{
    Offer::findOrFail($id)->delete();
    return back()->with('success', 'Offer deleted successfully');
}

}
