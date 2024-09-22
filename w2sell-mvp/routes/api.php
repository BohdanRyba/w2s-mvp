<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class, 'login']);
Route::middleware(['api','auth:sanctum'])->group(function () {
    Route::get('profile', [LoginController::class, 'profile']);
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::prefix('store/{storeId}')->group(function () {
        # categories
        Route::prefix('categories')->group(function () {
            Route::get('/', [StoreController::class, 'categories']);
            Route::get('{categoryId}', [StoreController::class, 'category']);
        });

        # products
        Route::get('products', [StoreController::class, 'products']);
        Route::prefix('category/{categoryId}')->group(function () {
            Route::prefix('products')->group(function () {
                Route::get('/', [StoreController::class, 'categoryProducts']);
                Route::get('{productId}', [StoreController::class, 'categoryProduct']);
            });
        });
    });
});
