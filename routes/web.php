<?php

use Illuminate\Support\Facades\Route;



class Task
 {
     public function __construct(
         public int $id,
         public string $title,
         public string $description,
         public ?string $long_description,
         public bool $completed,
         public string $created_at,
         public string $updated_at
     ) {
     }
 }
 

Route::get('/', function () {
     return redirect()->route('tasks.index');
 });

//rendering templates
Route::get('tasks/', function () {
    // $taskindex =\App\Models\Task::latest()->where('completed', true)->get();
    $taskindex =\App\Models\Task::latest()->where('completed', true)->get();
    return view('index' , [
        'tasks' => $taskindex,
    ]);

})->name('tasks.index');

//redirecting single task
Route::get('/tasks/{id}', function ($id)  {
     $task=\App\Models\Task::findOrFail($id);
 
     return view('show', ['task' => $task]);
 })->name('tasks.show');





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