<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HospitalController;





Route::resource('hospitals', HospitalController::class);


Route::get('/', function () {
    return view('welcome');
});
