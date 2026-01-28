<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use Illuminate\Support\Facades\DB;

class BusController extends Controller
{

    public function list(Request $request)
    {

        $request->validate([
            'from' => 'required|string',
            'to'   => 'required|string',
            'date' => 'required|date|after_or_equal:today',
        ]);

        $buses = Bus::where('from_city', $request->from)
                    ->where('to_city', $request->to)
                    ->get();

        return view('buses', compact('buses'));
    }

    public function searchCities(Request $request)
    {
        $query = $request->get('q');

        if (!$query) {
            return response()->json([]);
        }

        $cities = DB::table('buses')
            ->select('from_city as city')
            ->where('from_city', 'LIKE', "%{$query}%")
            ->union(
                DB::table('buses')
                    ->select('to_city as city')
                    ->where('to_city', 'LIKE', "%{$query}%")
            )
            ->distinct()
            ->orderBy('city')
            ->limit(10)
            ->pluck('city');

        return response()->json($cities);
    }
}
