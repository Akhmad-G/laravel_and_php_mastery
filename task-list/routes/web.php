<?php

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks/', function () {
  return view('index', [
    'tasks' => Task::latest()->paginate(10),
  ]);
})->name('tasks.index');

Route::view('tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
  return view('edit', [
    'task' => $task
  ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
  return view('show', [
    'task' => $task
  ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
//  $data = $request->validated();
//
//  $task = new Task;
//  $task->title = $data['title'];
//  $task->description = $data['description'];
//  $task->long_description = $data['long_description'];
  
//  $task->save();
  
  $task = Task::create($request->validated());
  
  return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task created successfully!');
  
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
//  $task = Task::findOrFail($id);

//  $data = ;
//  $task->title = $data['title'];
//  $task->description = $data['description'];
//  $task->long_description = $data['long_description'];
  
  $task->update($request->validated());
  
  return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task updated successfully!');
  
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
  $task->delete();
  
  return redirect()->route('tasks.index')
    ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
  $task->toggleComplete();
  return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle-complete');


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
