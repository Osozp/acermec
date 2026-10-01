<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureCommerceIsActive;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', EnsureCommerceIsActive::class])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

<<<<<<< HEAD
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('sales', SaleController::class);
=======
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('sales', SaleController::class);
>>>>>>> 2cdcc04bd7fa5f06f2763c31b37cccf08d72b163

    Route::resource('users', UserController::class)
        ->middleware('can:isOwner,App\Models\User');
});
