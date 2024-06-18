<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('products',[ProductController::class,'all'])->name('product.all');
Route::get('products/{id}',[ProductController::class,'show'])->name('product.show');
Route::get('tim-kiem-tu-khoa',[ProductController::class,'keyword'])->name('product.keyword');
Route::get('categories',[CategoryController::class,'all'])->name('category.all');
Route::get('category/{id}',[CategoryController::class,'show'])->name('category.show');
Route::post('order',[CustomerController::class,'store'])->name('customer.store');