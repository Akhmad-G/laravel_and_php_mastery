<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks/', function () {
  return view('index', [
    'tasks' => Task::latest()->where('completed', true)-> get(),
  ]);
})->name('tasks.index');

Route::view('tasks/create', 'create') ->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
  return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
  $data = $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required'
  ]);
  
  $task = new Task;
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];
  
  $task->save();
  
  return redirect()->route('tasks.show', ['id' => $task->id]);
  
})->name('tasks.store');


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
