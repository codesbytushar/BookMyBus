<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\BusBookingController;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {

    Route::get('/search-buses', function () {
        return view('search');
    })->name('search.buses');

    Route::get('/buses', [BusController::class, 'list'])
        ->name('buses.list');

    // NEW booking routes
    Route::get('/booking/{busId}', [BusBookingController::class, 'create'])
        ->name('booking.form');

    Route::post('/booking', [BusBookingController::class, 'store'])
        ->name('booking.store');

    Route::get('/my-bookings', [BusBookingController::class, 'myBookings'])
        ->name('my.bookings');

    // Search form page
    Route::get('/search-buses', function () {
        return view('search');
    })->name('search.buses');

    // Bus list after search
    Route::get('/buses', [BusController::class, 'list'])
        ->name('buses.list');
});

/* Login */
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

/* Register */
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

/* Logout */
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
