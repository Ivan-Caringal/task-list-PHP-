<?php

use Illuminate\Support\Facades\Route;
//rendering templates
Route::get('/', function () {
    return view('index' , [
        'name' => 'John Doe'
    ]);

});

// route naming
 Route::get('/xxx', function () {
     return 'Hello';
 })->name('hello');
 
 Route::get('/hallo', function () {
     return redirect()->route('hello');
 });

Route::fallback(function () {
     return 'Still got somewhere!';
 });

// GET
 // POST 
 // PUT 
 // DELETE 