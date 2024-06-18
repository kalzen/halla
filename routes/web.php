<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\DashboardController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkAdminLogin;
// dashboard
Route::get('/',[DashboardController::class,'index'])->name('dashboard');
// product
Route::get(
    '/login',
    [AdminLoginController::class, 'getLogin']
)->name('login');
Route::post(
    '/login',
    [AdminLoginController::class, 'postLogin']
)->name('postLogin');
Route::get(
    '/logout',
    [AdminLoginController::class, 'getLogout']
)->name('getLogout');
Route::get(
    '/product',
    [ProductController::class, 'all']
)->name('product.all')->middleware('auth');
Route::get(
    '/product/{id}',
    [ProductController::class, 'show']
)->name('product.show')->middleware('auth');
Route::get(
    '/product-delete/{id}',
    [ProductController::class, 'destroy']
)->name('product.destroy')->middleware('auth');
Route::get(
    '/product-add',function()
    {
        $categories = Category::all();
        return view('product/store',compact('categories'));
    }
);
Route::post('/product-add',[ProductController::class,'store'])->name('product.store')->middleware('auth');
Route::post(
    '/product/{id}',
    [ProductController::class, 'update']
)->name('product.update')->middleware('auth');
//category
Route::get(
    '/category',
    [CategoryController::class, 'all']
)->name('category.all')->middleware('auth');
Route::get(
    '/category/{id}',
    [CategoryController::class, 'show']
)->name('category.show')->middleware('auth');
Route::get(
    '/category-delete/{id}',
    [CategoryController::class, 'destroy']
)->name('category.destroy')->middleware('auth');
Route::get(
    '/category-add',function()
    {
        
        return view('category/store');
    }
);
Route::post('/category-add',[CategoryController::class,'store'])->name('category.store')->middleware('auth');
Route::post(
    '/category/{id}',
    [CategoryController::class, 'update']
)->name('category.update')->middleware('auth');
// order
Route::get('/order/{id}',[OrderController::class,'show'])->name('order.show')->middleware('auth');
Route::get('/order-list',[OrderController::class,'all'])->name('order.all')->middleware('auth');
// customer 
Route::get('/customer/{id}',[CustomerController::class,'show'])->name('customer.show')->middleware('auth');
Route::get('/customer-list',[CustomerController::class,'all'])->name('customer.all')->middleware('auth');
