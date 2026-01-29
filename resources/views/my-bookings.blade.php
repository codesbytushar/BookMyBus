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

        @endif

    </div>
</div>

@endsection
