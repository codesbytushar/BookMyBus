<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookingController;

Route::get("home",[bookingController::class,"index"]);
