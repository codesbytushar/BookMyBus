@extends('layouts.app')

@section('content')

<h3 class="mb-4 fw-bold text-center">Passenger Details</h3>

<div class="card shadow-sm">
    <div class="card-body">

        <h5 class="mb-3">{{ $bus->bus_name }} (₹{{ $bus->price }})</h5>

        <form method="POST" action="{{ route('booking.store') }}">
            @csrf

            <input type="hidden" name="bus_id" value="{{ $bus->id }}">

            <div class="mb-3">
                <label>Passenger Name</label>
                <input type="text" name="passenger_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Passenger Age</label>
                <input type="number" name="passenger_age" class="form-control" required>
            </div>
            <input type="hidden" name="journey_date" value="{{ $journeyDate }}">
            <div class="mb-3">
                <label>Number of Seats</label>
                <select name="seat_count" class="form-control" required>
                    @for($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <button class="btn btn-primary w-100">
                Confirm Booking
            </button>
        </form>

    </div>
</div>

@endsection
