<?php
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

// Authentication Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('/user', [AuthController::class, 'user']);

// Protected Routes
Route::middleware('auth:api')->group(function () {
    // Order Routes
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']); // Get all orders for the authenticated user
        Route::post('/', [OrderController::class, 'store']); // Create a new order
        Route::get('/{id}', [OrderController::class, 'show']); // Get details of a specific order
        Route::put('/{id}', [OrderController::class, 'update']); // Update an existing order
        Route::delete('/{id}', [OrderController::class, 'destroy']); // Delete an order
    });
});

// Test Endpoint
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});
