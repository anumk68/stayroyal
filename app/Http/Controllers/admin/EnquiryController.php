<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function customer_enquery(){   
    $enquries = Enquiry::where('Is_subscribe', 0)->get(); 
    return view('admin.enquiry.index', compact('enquries'));
    }

    public function enquiry_delete(Request $request, $id) {
        $enquery = Enquiry::findOrFail($id); 
        $enquery->delete();
        return redirect()->route('adminenquery')->with('success', 'Enquiry deleted successfully.');
    }
}
