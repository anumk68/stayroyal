<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomCategoryController extends Controller
{
    //
    public function room_category()
    {
        $roomCategory = RoomCategory::all();
        return view('admin.roomCategory.index', compact('roomCategory'));
    }
    public function room_category_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|unique:room_categories,category',
            'status' => 'nullable|boolean',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        RoomCategory::create([
            'category' => $request->category,
            'status' => $request->status ?? 1,
        ]);
        return back()->with('success', 'Room Category Added Successfully');
    }
    public function roomCategory_delete(Request $request, $id)
    {
        $roomCategory = RoomCategory::findOrFail($id);
        $roomCategory->delete();
        return redirect()->route('room-category')->with('success', 'Room Category Deleted Successfully');
    }
    public function roomCategoryBulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        if (!empty($ids)) {
            $delete = RoomCategory::whereIn('id', $ids)->forceDelete();
            if ($delete) {
                return response()->json(['message' => 'Selected rooms category deleted successfully.']);
            } else {
                return response()->json(['message' => 'Not deleted! please try again.']);

            }
        }
        return response()->json(['message' => 'No rooms selected.'], 400);
    }
}
