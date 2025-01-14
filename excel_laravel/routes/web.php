<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('customer/import', [CustomerController::class, 'index']);
Route::post('customer/import', [CustomerController::class, 'importExcelData']);
