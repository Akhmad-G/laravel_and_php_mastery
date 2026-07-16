<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks/', function () {
  return view('index', [
    'tasks' => \App\Models\Task::latest()->where('completed', true)-> get(),
  ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
  return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');



//// Add new Route
//Route::get('/hello', function () {
//    return 'Hello';
//}) -> name("hello");  // Add name to the Route
//
//// Route with parameter
//Route::get('/greet/{name}', function ($name) {
//    return 'Hello ' . $name . '!';
//});
//
//// Redirect Route
//Route::get('/hallo', function () {
//    return redirect() -> route('hello');    // Redirect by route name
//});
//
//// Return, when try to open not existing route or page
//Route::fallback(function () {
//    return 'Still got somewhere!';
//});
