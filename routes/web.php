<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdmissionController;

Route::get('/', function () {
    return view('welcome');
});

// Public admission routes
Route::get('/admission', [AdmissionController::class, 'create'])->name('admission.create');
Route::post('/admission', [AdmissionController::class, 'store'])->name('admission.store');

// Admin admission routes
Route::get('/admin/admissions', [AdmissionController::class, 'index'])->name('admin.admissions.index');
Route::post('/admin/admissions/{admission}', [AdmissionController::class, 'updateStatus'])->name('admin.admissions.update');

