<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;

// Explicit model binding: {category} -> Kategori model
Route::model('category', \App\Models\Kategori::class);

// Public route - Login to get token
Route::post('/login', [AuthController::class, 'login']);

// Protected routes - require Sanctum token authentication
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Category API (CRUD)
    Route::apiResource('categories', CategoryApiController::class);

    // Product API (CRUD)
    Route::apiResource('products', ProductApiController::class);
});

