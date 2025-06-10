<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductColorController;
use App\Http\Controllers\ColorImageController;
use App\Http\Controllers\OrderController;

// Category Routes
Route::apiResource('categories', CategoryController::class);

// Product Routes
Route::apiResource('products', ProductController::class);
Route::get('products', [ProductController::class, 'index']);

// Product Image Routes
Route::apiResource('product-images', ProductImageController::class);

// Product Color Routes
Route::apiResource('product-colors', ProductColorController::class);

// Color Image Routes
Route::apiResource('color-images', ColorImageController::class);

// Order Routes
Route::apiResource('orders', OrderController::class);

Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus']);