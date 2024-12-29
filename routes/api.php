<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PlayerApiController;
use App\Http\Controllers\API\CategoryApiController;
use App\Http\Controllers\AuthController;


Route::get('/players', [PlayerApiController::class, 'getAllPlayers']);
Route::get('/categories', [CategoryApiController::class, 'getAllCategories']);
Route::get('/players/category/{id}', [PlayerApiController::class, 'getPlayersByCategory']);



Route::prefix('players')->group(function () {
    Route::get('/', [PlayerApiController::class, 'index']);
    Route::get('/{id}', [PlayerApiController::class, 'show']);
    Route::get('/search', [PlayerApiController::class, 'search']);
    Route::post('/', [PlayerApiController::class, 'store']);
    Route::put('/{id}', [PlayerApiController::class, 'update']);
    Route::delete('/{id}', [PlayerApiController::class, 'destroy']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Example route to test API connection
Route::get('/status', function () {
    return response()->json(['status' => 'API is working!']);
});
