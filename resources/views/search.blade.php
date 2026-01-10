@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card shadow-sm">
            <div class="card-body">

                <h2 class="text-center mb-4 fw-bold">Search Bus Tickets</h2>

                <form method="GET" action="{{ route('buses.list') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">From</label>
                            <input type="text" name="from" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">To</label>
                            <input type="text" name="to" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Journey Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-primary px-5">Search Buses</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
