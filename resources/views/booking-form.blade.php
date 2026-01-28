@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

        <div class="card card-rounded shadow-sm">
            <div class="card-body p-4">

                <h4 class="fw-bold mb-4 text-center">
                    Passenger Details
                </h4>

                {{-- bus summary --}}
                <div class="bg-light rounded p-3 mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1 fw-bold">{{ $bus->bus_name }}</h5>
                            <p class="mb-0 text-muted">
                                {{ $bus->from_city }} → {{ $bus->to_city }}
                            </p>
                            <small class="text-muted">
                                Departure: {{ $bus->departure_time }}
                            </small>
                        </div>
                        <div class="text-end">
                            <h5 class="text-primary fw-bold mb-0">
                                ₹{{ $bus->price }}
                            </h5>
                            <small class="text-muted">per seat</small>
                        </div>
                    </div>
                </div>

                {{-- booking form --}}
                <form method="POST" action="{{ route('booking.store') }}">
                    @csrf

                    <input type="hidden" name="bus_id" value="{{ $bus->id }}">
                    <input type="hidden" name="journey_date" value="{{ $journeyDate }}">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Passenger Name
                            </label>
                            <input type="text"
                                   name="passenger_name"
                                   class="form-control"
                                   placeholder="Enter full name"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Passenger Age
                            </label>
                            <input type="number"
                                   name="passenger_age"
                                   class="form-control"
                                   min="1"
                                   placeholder="Age"
                                   required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Number of Seats
                        </label>
                        <select name="seat_count" class="form-control" required>
                            @for($i = 1; $i <= 6; $i++)
                                <option value="{{ $i }}">{{ $i }} Seat{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
                        </select>
                    </div>

                    <button class="btn btn-primary btn-lg w-100 rounded-2">
                        Confirm Booking
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
