<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/location', [LocationController::class, 'showLocationAndDistance']);
Route::get('/admin', function () {
    return view('admin');
});