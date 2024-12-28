<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PlayerApiController;
use App\Http\Controllers\API\CategoryApiController;



Route::get('/players', [PlayerApiController::class, 'getAllPlayers']);
Route::get('/categories', [CategoryApiController::class, 'getAllCategories']);
Route::get('/players/category/{id}', [PlayerApiController::class, 'getPlayersByCategory']);

// Example route to test API connection
Route::get('/status', function () {
    return response()->json(['status' => 'API is working!']);
});
