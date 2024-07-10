<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CodeController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/stage/{stage}', [HomeController::class, 'stage'])->name('stage');
Route::get('/random', [HomeController::class, 'randomInput'])->name('randomInput');
Route::get('/getDataSchedule', [HomeController::class, 'getDataSchedule'])->name('getDataSchedule');
Route::get('/getDataStage/{id}', [HomeController::class, 'getDataStage'])->name('getDataStage');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/schedule', [ScheduleController::class, 'index'])->middleware(['auth', 'verified'])->name('schedule.index');
Route::get('/main', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');
Route::post('/schedule/store', [ScheduleController::class, 'store'])->middleware(['auth', 'verified'])->name('schedule.store');
Route::get('/schedule/create', [ScheduleController::class, 'create'])->middleware(['auth', 'verified'])->name('schedule.create');
Route::get('/code', [CodeController::class, 'index'])->middleware(['auth', 'verified'])->name('code.index');
Route::post('/code/store', [CodeController::class, 'store'])->middleware(['auth', 'verified'])->name('code.store');
Route::get('/code/create', [CodeController::class, 'create'])->middleware(['auth', 'verified'])->name('code.create');
Route::get('/setting', [SettingController::class, 'index'])->middleware(['auth', 'verified'])->name('setting.index');
Route::get('/setting/edit/{id}', [SettingController::class, 'edit'])->middleware(['auth', 'verified'])->name('setting.edit');
Route::post('/setting/edit', [SettingController::class, 'update'])->middleware(['auth', 'verified'])->name('setting.update');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
