<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/attendance', [AttendanceController::class, 'showForm'])->name('attendance.form');
Route::post('/attendance', [AttendanceController::class, 'submit'])->name('attendance.submit');


