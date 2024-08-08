<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route resource for products
Route::resource('/tickets', \App\Http\Controllers\TicketsController::class);