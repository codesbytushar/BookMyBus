<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusController;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {

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
