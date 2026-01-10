<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    public function list(Request $request)
    {
        $buses = Bus::where('from_city', $request->from)
                    ->where('to_city', $request->to)
                    ->get();

        return view('buses', compact('buses'));
    }
}
