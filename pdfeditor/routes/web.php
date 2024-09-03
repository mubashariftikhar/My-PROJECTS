<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php
use App\Http\Controllers\PdfController;

Route::get('/pdf/form', [PdfController::class, 'showForm'])->name('pdf.form');
Route::post('/pdf/upload', [PdfController::class, 'upload'])->name('pdf.upload');
Route::get('/pdf/{id}', [PdfController::class, 'show'])->name('pdf.show');
Route::post('/pdf/{id}/signature', [PdfController::class, 'addSignature'])->name('pdf.addSignature');
