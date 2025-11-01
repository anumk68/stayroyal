<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Blogcategory;
use App\Models\Booking;
use App\Models\Enquiry;
use App\Models\Meta;
use App\Models\Offer;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Room;
use App\Models\Roomtype;
use Illuminate\Http\Request;

class BulkDeleteController extends Controller
{

    public function roombulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (! empty($ids)) {
            Room::whereIn('id', $ids)->delete();
            return response()->json(['message' => 'Selected rooms deleted successfully.']);
        }

        return response()->json(['message' => 'No rooms selected.'], 400);
    }
    public function roomtype_bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (! empty($ids)) {
            $delete = Roomtype::whereIn('id', $ids)->forceDelete();
            if ($delete) {

                return response()->json(['message' => 'Selected rooms type deleted successfully.']);
            } else {
                return response()->json(['message' => 'Not deleted! please try again.']);

            }
        }

        return response()->json(['message' => 'No rooms selected.'], 400);
    }

    public function roombooking_bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (! empty($ids)) {
            $delete = Booking::whereIn('id', $ids)->forceDelete();
            if ($delete) {

                return response()->json(['message' => 'Selected rooms booking deleted successfully.']);
            } else {
                return response()->json(['message' => 'Not deleted! please try again.']);
            }
        }
        return response()->json(['message' => 'No rooms selected.'], 400);
    }
    public function offer_bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (! empty($ids)) {
            $delete = Offer::whereIn('id', $ids)->forceDelete();
            if ($delete) {

                return response()->json(['message' => 'Selected rooms offer deleted successfully.']);
            } else {
                return response()->json(['message' => 'Not deleted! please try again.']);
            }
        }
        return response()->json(['message' => 'No rooms selected.'], 400);
    }
    public function blogcategory_bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (! empty($ids)) {
            $delete = Blogcategory::whereIn('id', $ids)->forceDelete();
            if ($delete) {

                return response()->json(['message' => 'Selected blog category deleted successfully.']);
            } else {
                return response()->json(['message' => 'Not deleted! please try again.']);
            }
        }
        return response()->json(['message' => 'No rooms selected.'], 400);
    }
    public function blog_bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (! empty($ids)) {
            $delete = Blog::whereIn('id', $ids)->forceDelete();
            if ($delete) {

                return response()->json(['message' => 'Selected blog deleted successfully.']);
            } else {
                return response()->json(['message' => 'Not deleted! please try again.']);
            }
        }
        return response()->json(['message' => 'No rooms selected.'], 400);
    }
    public function customer_inquery_bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (! empty($ids)) {
            $delete = Enquiry::whereIn('id', $ids)->forceDelete();
            if ($delete) {

                return response()->json(['message' => 'Selected Enquiry deleted successfully.']);
            } else {
                return response()->json(['message' => 'Not deleted! please try again.']);
            }
        }
        return response()->json(['message' => 'No rooms selected.'], 400);
    }
    public function metatag_bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (! empty($ids)) {
            $delete = Meta::whereIn('id', $ids)->forceDelete();
            if ($delete) {

                return response()->json(['message' => 'Selected Meta tags deleted successfully.']);
            } else {
                return response()->json(['message' => 'Not deleted! please try again.']);
            }
        }
        return response()->json(['message' => 'No rooms selected.'], 400);
    }
    public function payment_history_bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        if (! empty($ids)) {
            $delete = Payment::whereIn('id', $ids)->forceDelete();
            if ($delete) {

                return response()->json(['message' => 'Selected payment history deleted successfully.']);
            } else {
                return response()->json(['message' => 'Not deleted! please try again.']);
            }
        }
        return response()->json(['message' => 'No rooms selected.'], 400);
    }
    public function review_bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        if (! empty($ids)) {
            $delete = Review::whereIn('id', $ids)->forceDelete();
            if ($delete) {

                return response()->json(['message' => 'Selected review deleted successfully.']);
            } else {
                return response()->json(['message' => 'Not deleted! please try again.']);
            }
        }
        return response()->json(['message' => 'No rooms selected.'], 400);
    }
}
