<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookMyBus</title>

    <link rel="stylesheet" href="{{ asset('bookingTheme/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('bookingTheme/css/style.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
    <a class="navbar-brand fw-bold" href="/">🚌 BookMyBus</a>
        <div class="ms-auto">
            @auth
                <span class="text-white me-2">Hi, {{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-light btn-sm">Logout</button>
                </form>
                <a href="{{ route('my.bookings') }}" class="btn btn-light btn-sm me-2">
                    My Bookings
                </a>

            @else
                <a href="{{ route('login') }}" class="btn btn-light btn-sm me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-light btn-sm">Register</a>
            @endauth
        </div>
</nav>

<div class="container py-5">
    @yield('content')
</div>

<script src="{{ asset('bookingTheme/vendors/js/vendor.bundle.base.js') }}"></script>
</body>
</html>
