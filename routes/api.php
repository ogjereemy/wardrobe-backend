<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothingItemController;

/*
|--------------------------------------------------------------------------
| API Routes

|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public route for testing API
Route::get('/test', function () {
    return ['message' => 'API is working!'];
});

// Routes that require authentication (Sanctum middleware)
Route::middleware('auth:sanctum')->group(function () {

    // Clothing items resource routes (CRUD)
    Route::apiResource('clothing-items', ClothingItemController::class);
    
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/clothing-items', [ClothingItemController::class, 'index']);
    Route::post('/clothing-items', [ClothingItemController::class, 'store']);
    Route::put('/clothing-items/{id}', [ClothingItemController::class, 'update']);
    Route::delete('/clothing-items/{id}', [ClothingItemController::class, 'destroy']);


    // Filtering and searching clothing items
    Route::get('clothing-items/search/{keyword}', [ClothingItemController::class, 'search']);
    Route::get('clothing-items/filter/{category}', [ClothingItemController::class, 'filter']);

});
