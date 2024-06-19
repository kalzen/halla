<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/stage/{stage}', [HomeController::class, 'stage'])->name('stage');
Route::get('/random', [HomeController::class, 'randomInput'])->name('randomInput');
Route::get('/random-data', [HomeController::class, 'getRandomData'])->name('random-data');