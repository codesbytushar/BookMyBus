@extends('layouts.app')

@section('content')

<h3 class="mb-4 fw-bold text-center">My Bookings</h3>

@if($bookings->count() == 0)
    <div class="alert alert-info text-center">
        No bookings found
    </div>
@else
    @foreach($bookings as $booking)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5>{{ $booking->bus->bus_name }}</h5>
                <p class="mb-1">Route: {{ $booking->bus->from_city }} → {{ $booking->bus->to_city }}</p>
                <p class="mb-1">Passenger: {{ $booking->passenger_name }}</p>
                <p class="mb-1">Journey Date: {{ $booking->journey_date }}</p>
                <strong class="text-primary">₹{{ $booking->bus->price }}</strong>
                <p class="mb-1">
                    Seats Booked:
                    <strong>{{ $booking->seat_number }}</strong>
                </p>
                <p class="mb-1">
                    Total Seats: {{ $booking->seat_count }}
                </p>
            </div>
        </div>
    @endforeach
@endif

@endsection
