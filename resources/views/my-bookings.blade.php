@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10 col-md-12">

        <h4 class="fw-bold mb-4 text-center">
            My Bookings
        </h4>

        @if($bookings->count() == 0)
            <div class="alert alert-info text-center">
                You have no bookings yet
            </div>
        @else

            @foreach($bookings as $booking)
                <div class="card card-rounded shadow-sm mb-4">
                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="fw-bold mb-1">
                                    {{ $booking->bus->bus_name }}
                                </h5>
                                <p class="text-muted mb-0">
                                    {{ $booking->bus->from_city }} → {{ $booking->bus->to_city }}
                                </p>
                            </div>

                            <div class="text-end">
                                <h5 class="text-primary fw-bold mb-0">
                                    ₹{{ $booking->bus->price * $booking->seat_count }}
                                </h5>
                                <small class="text-muted">Total Fare</small>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <p class="mb-1 text-muted">Passenger</p>
                                <p class="fw-semibold mb-0">
                                    {{ $booking->passenger_name }}
                                </p>
                            </div>




                    </div>
                </div>
            @endforeach

        @endif

    </div>
</div>

@endsection
