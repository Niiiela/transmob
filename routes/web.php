<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);
Route::get('/tracking', TrackingController::class);