<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BusBookingController extends Controller
{
    // Show passenger details form
    public function create(Request $request, $busId)
    {
        $bus = Bus::findOrFail($busId);
        $journeyDate = $request->date;

        return view('booking-form', compact('bus', 'journeyDate'));
    }


    // Store booking with seat allocation
    public function store(Request $request)
    {
        $request->validate([
            'bus_id' => 'required',
            'passenger_name' => 'required',
            'passenger_age' => 'required|integer',
            'seat_count' => 'required|integer|min:1',
            'journey_date' => 'required|date',
        ]);


        // Fetch already booked seats for same bus & date
        $existingSeats = Booking::where('bus_id', $request->bus_id)
            ->where('journey_date', $request->journey_date)
            ->pluck('seat_number')
            ->toArray();

        $bookedSeats = [];
        foreach ($existingSeats as $seatGroup) {
            $bookedSeats = array_merge($bookedSeats, explode(',', $seatGroup));
        }

        // Generate seat list S1-S40
        $allSeats = [];
        for ($i = 1; $i <= 40; $i++) {
            $allSeats[] = 'S' . $i;
        }

        // Find available seats
        $availableSeats = array_values(array_diff($allSeats, $bookedSeats));

        if (count($availableSeats) < $request->seat_count) {
            return back()->with('error', 'Not enough seats available');
        }

        // Assign seats
        $assignedSeats = array_slice($availableSeats, 0, $request->seat_count);

        Booking::create([
            'user_id' => Auth::id(),
            'bus_id' => $request->bus_id,
            'passenger_name' => $request->passenger_name,
            'passenger_age' => $request->passenger_age,
            'seat_count' => $request->seat_count,
            'seat_number' => implode(',', $assignedSeats),
            'journey_date' => $request->journey_date,
        ]);

        return redirect()->route('my.bookings')
            ->with('success', 'Booking successful! Seats: ' . implode(', ', $assignedSeats));
    }

    // Show logged-in user's bookings
    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with('bus')
            ->latest()
            ->get();

        return view('my-bookings', compact('bookings'));
    }
}
