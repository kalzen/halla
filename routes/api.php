<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/getmodel', [HomeController::class, 'getModel'])->name('getModel');
Route::any('/data', [HomeController::class, 'getData'])->name('getData');