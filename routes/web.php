<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/stage/{stage}', [HomeController::class, 'stage'])->name('stage');
Route::get('/random', [HomeController::class, 'randomInput'])->name('randomInput');
Route::get('/getDataSchedule', [HomeController::class, 'getDataSchedule'])->name('getDataSchedule');
Route::get('/getDataStage/{id}', [HomeController::class, 'getDataStage'])->name('getDataStage');


Route::get('/schedule', [ScheduleController::class, 'index'])->middleware(['auth', 'verified'])->name('schedule.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/schedule/store', [ScheduleController::class, 'store'])->middleware(['auth', 'verified'])->name('schedule.store');
Route::get('/schedule/create', [ScheduleController::class, 'create'])->middleware(['auth', 'verified'])->name('schedule.create');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
