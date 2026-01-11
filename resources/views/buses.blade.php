@extends('layouts.app')

@section('content')

<h3 class="mb-4 fw-bold text-center">Available Buses</h3>

@if($buses->count() == 0)
    <div class="alert alert-warning text-center">
        No buses found for selected route
    </div>
@else
    @foreach($buses as $bus)
        <div class="card mb-3 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">{{ $bus->bus_name }}</h5>
                    <p class="mb-0">
                        Departure: {{ $bus->departure_time }}
                    </p>
                </div>

                <div>
                    <h5 class="text-primary">₹{{ $bus->price }}</h5>
                </div>

                <div>
                    <a href="{{ route('booking.form', ['busId' => $bus->id, 'date' => request('date')]) }}" class="btn btn-success">
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@endif

@endsection
