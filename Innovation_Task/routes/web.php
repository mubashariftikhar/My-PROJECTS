<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(StudentController::class)->group(function(){
    Route::get('/students','index')->name('students.index');
    Route::get('/students/create','create')->name('students.create');
    Route::post('/students','store')->name('students.store');
    Route::get('/students/{student}/edit','edit')->name('students.edit');
    Route::put('/students/{student}','update')->name('students.update');
    Route::delete('/students/{student}','destroy')->name('students.destroy');    
});
Route::controller(AttendanceController::class)->group(function(){
    Route::get('/attendance','index')->name('index');
    Route::get('/taxtask','show')->name('taxtask');

});