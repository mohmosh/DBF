<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



Route::middleware(['web'])->group(function () {

    // Home page route
    Route::get('/', function () {
        return view('welcome');
    });

    // Registration form
    Route::get('register', function () {
        return view('auth.register'); // or whatever view you are using for registration
    });

    // Registration
    Route::post('register', [RegisterController::class, 'register']);
});

