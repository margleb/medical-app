<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return redirect('/doctors');
});

Route::resource('doctors', DoctorController::class);
Route::resource('patients', PatientController::class);
