<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookMyBus</title>

    <!-- Star Admin CSS -->
    <link rel="stylesheet" href="{{ asset('bookingTheme/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('bookingTheme/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bookingTheme/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('bookingTheme/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bookingTheme/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('bookingTheme/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('bookingTheme/css/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('bookingTheme/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('bookingTheme/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

   
    <style>
    .ms-0 {
        margin-left: 0 !important;
    }
</style>

</head>

<body class="with-welcome-text">

<div class="container-scroller">

    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-center flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <a class="navbar-brand fw-bold text-primary ms-3 d-flex align-items-center"
               href="/"
               style="height:70px;font-size:22px;">
                🚌 <span class="ms-2">BookMyBus</span>
            </a>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-center ms-auto pe-4">
            <ul class="navbar-nav ms-auto d-flex align-items-center">

                @auth
                    <li class="nav-item nav-profile-text me-3">
                        <span class="fw-semibold text-dark">
                            Hi, {{ auth()->user()->name }}
                        </span>
                    </li>

                    <li class="nav-item me-2">
                        <a href="{{ route('my.bookings') }}" class="btn btn-primary btn-sm rounded-1">
                            My Bookings
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm rounded-1">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item me-2">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm rounded-1">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm rounded-1">
                            Register
                        </a>
                    </li>
                @endauth

            </ul>
        </div>
    </nav>

   <div class="container-fluid page-body-wrapper">

        @if(!$isAuthPage)
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">

                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('search.buses') }}">
                        <i class="mdi mdi-bus menu-icon"></i>
                        <span class="menu-title">Book Bus</span>
                    </a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('my.bookings') }}">
                        <i class="mdi mdi-ticket-confirmation menu-icon"></i>
                        <span class="menu-title">My Bookings</span>
                    </a>
                </li>
                @endauth

            </ul>
        </nav>
        @endif

        <div class="main-panel {{ $isAuthPage ? 'ms-0 w-100' : '' }}">
            <div class="content-wrapper {{ $isAuthPage ? 'p-0' : '' }}">

                {{-- page content --}}
                @yield('content')

            </div>

            {{-- footer --}}
            @if(!$isAuthPage)
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted">
                        © {{ date('Y') }} BookMyBus. All rights reserved.
                    </span>
                </div>
            </footer>
            @endif

        </div>
    </div>
</div>

<script src="{{ asset('bookingTheme/vendors/js/vendor.bundle.base.js') }}"></cript>
<script src="{{ asset('bookingTheme/js/off-canvas.js') }}"></script>
<script src="{{ asset('bookingTheme/js/template.js') }}"></script>
<script src="{{ asset('bookingTheme/js/settings.js') }}"></script>
<script src="{{ asset('bookingTheme/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('bookingTheme/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

</body>
</html>
