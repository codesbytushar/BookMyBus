@extends('layouts.app')

@section('content')

<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-8 text-center">

        <h1 class="fw-bold display-3 text-primary mb-3">
            🚌 BookMyBus
        </h1>

        <p class="lead mb-4">
            Book bus tickets easily, safely, and quickly
        </p>

        <a href="{{ route('search.buses') }}" class="btn btn-primary btn-lg px-5">
            Book Now
        </a>

    </div>
</div>

@endsection
