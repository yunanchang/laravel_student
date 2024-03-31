<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('animal',['name'=>'<h1>老王</h1>','sex'=>'男','point'=>80,'abc'=>0]);
});

// ------------
use App\Http\Controllers\AnimalController;
use App\Models\Animal;

Route::resource('animal',AnimalController::class);

// -----------------
use App\Http\Controllers\Ding;
Route::resource('index',Ding::class);
Route::get('db',[Ding::class,'dbtest']);
// -------------------------

use App\Http\Controllers\Student;
 
Route::get('list', [Student::class, 'list']);

// ------------------------------
Route::get('/list123', function () {
    return view('list123');
});
// -----------------------
Route::get('del/{id}', [Student::class, 'del']);