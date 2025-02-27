<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use App\Http\Controllers\ClothingItemController;
use App\Http\Controllers\CategoryController;


// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes that require authentication
Route::middleware([EnsureFrontendRequestsAreStateful::class, 'auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('clothing-items', [ClothingItemController::class, 'store']);
    Route::get('clothing-items', [ClothingItemController::class, 'index']);
    Route::get('clothing-items/{id}', [ClothingItemController::class, 'show']);
    Route::put('clothing-items/{id}', [ClothingItemController::class, 'update']);
    Route::delete('clothing-items/{id}', [ClothingItemController::class, 'destroy']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{id}', [CategoryController::class, 'show']);
    Route::post('categories', [CategoryController::class, 'store']);
    Route::put('categories/{id}', [CategoryController::class, 'update']);
    Route::delete('categories/{id}', [CategoryController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


