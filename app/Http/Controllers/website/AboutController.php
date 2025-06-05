<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
     public function index(){
      return view("website.about");
    }

    public function show_privacy_policy(){
      return view('website.privacy-policy');
    }
     public function show_refund_policy(){
      return view('website.refund-policy');
    }
    
}
