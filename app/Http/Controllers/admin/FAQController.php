<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\Room;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = DB::table('faqs')
            ->join('rooms', 'faqs.room_id', '=', 'rooms.id')
            ->join('roomtypes', 'rooms.room_type', '=', 'roomtypes.id')
            ->select(
                'faqs.*',
                'rooms.room_type as type',
                'roomtypes.room_type',
            )
            ->orderBy('faqs.id', 'desc')
            ->get();

        return view('admin.faq.index', compact('faqs'));
    }


    public function create()
    {
        $roomtypes = Room::with('room')->get();
        return view('admin.faq.create', compact('roomtypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'question' => 'required|string',
            'answer' => 'required|string',
            'status' => 'required|boolean',
        ]);

        FAQ::create($request->only('room_id', 'question', 'answer', 'status'));
        return redirect()->route('faq.index')->with('success', 'FAQ added successfully!');
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        $roomtypes = Room::all();
        return view('admin.faq.edit', compact('faq', 'roomtypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'question' => 'required|string',
            'answer' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $faq = FAQ::findOrFail($id);
        $faq->update($request->only('room_id', 'question', 'answer', 'status'));

        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully!');
    }

    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully!');
    }
}
