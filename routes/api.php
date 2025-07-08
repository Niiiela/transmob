<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FreightController;
use App\Http\Controllers\StepController;
use Illuminate\Support\Facades\Route;

Route::get('/ola', function () {
    return "Olá mundo Dani";
});



Route::post('/customer', [CustomerController::class, 'store']);
Route::post('/freight', [FreightController::class, 'store']);
Route::post('/step', [StepController::class, 'store']);
