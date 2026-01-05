<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bookingController extends Controller
{
    public function index(Request $request){
        return view("home");
    }
}
