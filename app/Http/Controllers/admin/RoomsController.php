<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomCategory;
use App\Models\Roomtype;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;

class RoomsController extends Controller
{
    public function view_rooms()
    {
        $rooms = Room::join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
            ->select('rooms.*', 'roomtypes.room_type')
            ->get();
        $roomtypes = Roomtype::all();
        return view('admin.rooms.index', compact('rooms', 'roomtypes'));
    }

    public function room_delete(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('adminroom')->with('success', 'Room deleted successfully.');
    }
    public function view_booking_list()
    {
        $bookings = Booking::join('users', 'bookings.user_id', '=', 'users.id')
            ->join('rooms', 'bookings.room_type', '=', 'rooms.room_type')
            ->join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
            ->select('bookings.*', 'users.user_name', 'rooms.location', 'rooms.price', 'rooms.size', 'roomtypes.room_type')
            ->get();
        //  $bookings = Booking::all();
        return view("admin.rooms.booking", compact('bookings'));
    }

    public function booking_delete(Request $request, $id)
    {
        $room = Booking::findOrFail($id);
        $room->delete();
        return redirect()->route('bookinglist')->with('success', 'Booking deleted successfully.');
    }


    public function room_booking_search(Request $request)
    {
        $bookings = Booking::join('users', 'bookings.user_id', '=', 'users.id')
            ->join('rooms', 'bookings.room_type', '=', 'rooms.room_type')
            ->join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
            ->select(
                'bookings.*',
                'users.user_name',
                'rooms.location',
                'rooms.price',
                'rooms.size',
                'roomtypes.room_type'
            )
            ->when($request->search, function ($query) use ($request) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('bookings.price', 'like', "%{$search}%")
                        ->orWhere('bookings.start_date', 'like', "%{$search}%")
                        ->orWhere('roomtypes.room_type', 'like', "%{$search}%")
                        ->orWhere('users.user_name', 'like', "%{$search}%");
                });
            })
            ->get();
        if ($request->ajax()) {
            return response()->json($bookings);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
            'size' => 'required',
            'location' => 'required|string|max:255',
            'room_type_id' => 'required|exists:roomtypes,id',
            'room_images.*' => 'required',
            'description' => 'nullable|string',
            'slug' => 'required|string|unique:rooms,slug',
            'schema_seo' => 'nullable|string',
        ]);


        $room = new Room();
        $room->price = $request->price;
        $room->size = $request->size;
        $room->location = $request->location;
        $room->room_type = $request->room_type_id;
        $room->rating = $request->rating ?? 0;
        $room->rating_count = $request->rating_count ?? 0;
        $room->check_in = $request->check_in;
        $room->check_out = $request->check_out;
        $room->status = $request->status;
        $room->description = $request->description;
        $room->slug = $request->slug;
        $room->sschema_seolug = $request->schema_seo;

        $amenities = [];
        foreach ($request->amenities as $index => $amenity) {
            $iconPath = null;
            if (isset($amenity['icon']) && is_file($amenity['icon'])) {
                $iconPath = $amenity['icon']->store('amenities', 'public');
            }
            $amenities[] = [
                'icon' => $iconPath,
                'text' => $amenity['text']
            ];
        }
        $room->amenities = json_encode($amenities);

        // Images
        if ($request->hasFile('room_images')) {
            $images = [];
            foreach ($request->file('room_images') as $file) {
                $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/rooms'), $name);
                $images[] = 'uploads/rooms/' . $name;
            }
            $room->room_images = json_encode($images);
        }

        $room->save();

        return redirect()->back()->with('success', 'Room added successfully.');
    }


    public function edit($id)
    {
        $roomtypes = Roomtype::all();
        $rooms = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('rooms', 'roomtypes'));
    }

    public function room_edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'size' => 'required|numeric|min:0',
            'room_type_id' => 'required|exists:roomtypes,id',
            'check_in' => 'nullable|date',
            'check_out' => 'nullable|date|after_or_equal:check_in',
            'rating' => 'nullable|numeric|min:0|max:5',
            'rating_count' => 'nullable|integer|min:0',
            'status' => 'required|in:0,1',
            'description' => 'nullable|string',
            'room_images.*' => 'nullable',
            'amenities' => 'nullable|array',
            'amenities.*.icon' => 'nullable',
            'amenities.*.text' => 'nullable|string',
            'slug' => 'required|string|unique:rooms,slug,' . $request->id,
            'schema_seo' => 'nullable|string',




        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $room = Room::findOrFail($request->id);

        $room->price = $validated['price'];
        $room->location = $validated['location'];
        $room->size = $validated['size'];
        $room->room_type = $validated['room_type_id'];
        $room->check_in = $request->check_in;
        $room->check_out = $request->check_out;
        $room->rating = $request->rating ?? null;
        $room->rating_count = $request->rating_count ?? 0;
        $room->status = $request->status;
        $room->description = $request->description;
        $room->slug = $request->slug;
        $room->slug = $validated['slug'];
        $room->schema_seo = $validated['schema_seo'];



        // Update images
        if ($request->hasFile('room_images')) {
            $imagePaths = [];
            foreach ($request->file('room_images') as $image) {
                $path = $image->store('uploads/rooms', 'public');
                $imagePaths[] = $path;
            }
            $room->room_images = json_encode($imagePaths);
        }

        // Handle amenities (icons + text)
        $amenities = [];
        if ($request->has('amenities')) {
            $existingAmenities = json_decode($room->amenities, true) ?? [];
            foreach ($request->amenities as $index => $amenity) {
                $iconPath = null;
                if (isset($amenity['icon']) && is_file($amenity['icon'])) {
                    $iconPath = $amenity['icon']->store('amenities', 'public');
                }
                $amenities[] = [
                    'icon' => $iconPath ?? ($existingAmenities[$index]['icon'] ?? null),
                    'text' => $amenity['text']
                ];
            }
            $room->amenities = json_encode($amenities);
        }

        $room->save();

        return redirect()->route('adminroom')->with('success', 'Room updated successfully!');
    }


    public function view_room_type()
    {
        $roomtypes = Roomtype::with('roomCategory')->get();
        $roomCategories = RoomCategory::where('status', 1)->get();
        return view('admin.roomType.index', compact('roomtypes', 'roomCategories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:room_types,id',
            'room_category_id' => 'required',
            'room_type' => 'required|string',
            'slug' => 'required|string|unique:room_types,slug,' . $request->id,
        ]);

        $roomType = RoomType::findOrFail($request->id);
        $roomType->update([
            'room_category_id' => $request->room_category_id,
            'room_type' => $request->room_type,
            'slug' => $request->slug,
        ]);

        return response()->json(['message' => 'Room type updated successfully.']);
    }
 

    public function room_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_type' => 'required|string|max:255|min:4',
            'slug' => 'required|string|unique:roomtypes,slug',
            'room_category_id' => 'required|exists:room_categories,id',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        Roomtype::create([
            'room_type' => $request->room_type,
            'slug' => $request->slug,
            'room_category_id' => $request->room_category_id,
        ]);
        return back()->with('success', 'Room Type Added Successfully');
    }

    public function roomtype_delete(Request $request, $id)
    {
        $roomtype = Roomtype::findOrFail($id);
        $roomtype->delete();
        return redirect()->route('adminroomtype')->with('success', 'Delete successfully.');
    }


    public function room_search(Request $request)
    {
        $rooms = Room::join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
            ->select('rooms.*', 'roomtypes.room_type')
            ->when($request->search, function ($query) use ($request) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('rooms.price', 'like', "%{$search}%")
                        ->orWhere('rooms.location', 'like', "%{$search}%")
                        ->orWhere('roomtypes.room_type', 'like', "%{$search}%");
                });
            })
            ->get();
        if ($request->ajax()) {
            return response()->json($rooms);
        }
    }

    public function roopmtypeupdate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:roomtypes,id',
            'room_category_id' => 'required',
            'room_type' => 'required|string',
            'slug' => 'required|string|unique:roomtypes,slug,' . $request->id,
        ]);

        $roomType = RoomType::findOrFail($request->id);
        $roomType->update([
            'Fcategory_id' => $request->room_category_id,
            'room_type' => $request->room_type,
            'slug' => $request->slug,
        ]);

        return response()->json(['message' => 'Room type updated successfully.']);
    }
}
