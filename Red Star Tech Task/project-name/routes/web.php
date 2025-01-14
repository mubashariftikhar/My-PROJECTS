<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
Route::get('/', function () {
    return view('welcome');
});



Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('employee', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::match(['put', 'patch'], 'employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');



