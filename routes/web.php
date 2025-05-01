<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;





Route::get('/', function () {
     return redirect()->route('tasks.index');
 });

//rendering templates
Route::get('tasks/', function () {
    // $taskindex =\App\Models\Task::latest()->where('completed', true)->get();
    // $taskindex =Task::latest()->where('completed', true)->get();
    $taskindex = Task::latest()->get();
    
    return view('index' , [
        'tasks' => $taskindex,
    ]);

})->name('tasks.index');

//order of route maters
Route::view('/tasks/create', 'create')
     ->name('tasks.create');

 
//redirecting single task
Route::get('/tasks/{id}', function ($id)  {
     $task=Task::findOrFail($id);
 
     return view('show', ['task' => $task] );
     
 })->name('tasks.show');

 
//editing forms
Route::get('/tasks/{id}/edit', function ($id) {
     return view('edit', [
         'task' => Task::findOrFail($id)
     ]);
 })->name('tasks.edit');









 //------------submiting daya
 //creating anew data
 Route::post('/tasks', function (Request $request) {
    // data validation
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
     return redirect()->route('tasks.show', ['id' => $task->id])
          ->with('success', 'Task created successfully!');
 })->name('tasks.store');

 //editing data

 Route::put('/tasks/{id}', function ($id, Request $request) {
     $data = $request->validate([
         'title' => 'required|max:255',
         'description' => 'required',
         'long_description' => 'required'
     ]);
 
     $task = Task::findOrFail($id);
     $task->title = $data['title'];
     $task->description = $data['description'];
     $task->long_description = $data['long_description'];
     $task->save();
 
     return redirect()->route('tasks.show', ['id' => $task->id])
         ->with('success', 'Task updated successfully!');
 })->name('tasks.update');





// route naming
//  Route::get('/xxx', function () {
//      return 'Hello';
//  })->name('hello');
 
//  Route::get('/hallo', function () {
//      return redirect()->route('hello');
//  });

// Route::fallback(function () {
//      return 'Still got somewhere!';
//  });

// GET
 // POST 
 // PUT 
 // DELETE 