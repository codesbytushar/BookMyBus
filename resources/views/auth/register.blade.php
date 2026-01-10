@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card shadow">
            <div class="card-body">

                <h4 class="text-center mb-4 fw-bold">Create Account</h4>

                <form method="POST" action="{{ route('register.post') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>

                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
                    </div>

                    <button class="btn btn-primary w-100">Register</button>

                    <p class="text-center mt-3 mb-0">
                        Already have an account?
                        <a href="{{ route('login') }}">Login</a>
                    </p>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
