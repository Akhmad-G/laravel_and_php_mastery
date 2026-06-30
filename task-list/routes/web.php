<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
//        'name' => 'Kuku'
    ]);
});

// Add new Route
Route::get('/hello', function () {
    return 'Hello';
}) -> name("hello");  // Add name to the Route

// Route with parameter
Route::get('/greet/{name}', function ($name) {
    return 'Hello ' . $name . '!';
});

// Redirect Route
Route::get('/hallo', function () {
    return redirect() -> route('hello');    // Redirect by route name
});

// Return, when try to open not existing route or page
Route::fallback(function () {
    return 'Still got somewhere!';
});
