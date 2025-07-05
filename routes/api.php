<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/ola', function () {
    return "Olá mundo Dani";
});

Route::post('/customer', [CustomerController::class, 'store']);