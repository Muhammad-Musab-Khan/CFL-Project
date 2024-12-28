<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Selection Page Route
Route::get('/selection', [PlayerController::class, 'showPlayers'])->name('selection');

// Search Players AJAX Route
Route::get('/search-players', [PlayerController::class, 'searchPlayers'])->name('players.search');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Players Management
    Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
    Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');
    Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
    Route::get('/players/{id}/edit', [PlayerController::class, 'edit'])->name('players.edit');
    Route::put('/players/{id}', [PlayerController::class, 'update'])->name('players.update');
    Route::delete('/players/{id}', [PlayerController::class, 'destroy'])->name('players.destroy');

    // Categories Management
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// User Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__.'/auth.php';
