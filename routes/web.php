<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;






Route::get('/', function () {
     return redirect()->route('tasks.index');
 });

//rendering templates
Route::get('tasks/', function () {
    // $taskindex =\App\Models\Task::latest()->where('completed', true)->get();
    // $taskindex =Task::latest()->where('completed', true)->get();
    $taskindex = Task::latest()->paginate(10);
    return view('index' , [
        'tasks' => $taskindex,
    ]);

})->name('tasks.index');

//order of route maters
Route::view('/tasks/create', 'create')
     ->name('tasks.create');

 
//redirecting single task
Route::get('/tasks/{task}', function (Task $task)  {
     return view('show', ['task' => $task] );
     
 })->name('tasks.show');


 
 
//editing forms
Route::get('/tasks/{task}/edit', function (Task $task) {
     return view('edit', [
         'task' => $task
     ]);
 })->name('tasks.edit');









 //------------submiting daya
 //creating anew data
 Route::post('/tasks', function (TaskRequest $request) {
    // data validation
    // $data = $request->validate([
    //      'title' => 'required|max:255',
    //      'description' => 'required',
    //      'long_description' => 'required'
    //  ]);
    //  $data = $request->validated();
    //  $task = new Task;
    //  $task->title = $data['title'];
    //  $task->description = $data['description'];
    //  $task->long_description
    //  = $data['long_description'];
    //  $task->save();

    //connected to fillable
     $task = Task::create($request->validated());
     return redirect()->route('tasks.show', ['task' => $task->id])
          ->with('success', 'Task created successfully!');
 })->name('tasks.store');


 //editing data
 Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    //  $data = $request->validate([
    //      'title' => 'required|max:255',
    //      'description' => 'required',
    //      'long_description' => 'required'
    //  ]);
 
    //  $data = $request->validated();
    //  $task->title = $data['title'];
    //  $task->description = $data['description'];
    //  $task->long_description = $data['long_description'];
    //  $task->save();

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