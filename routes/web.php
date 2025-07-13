<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\LandmarkController;
use App\Http\Controllers\DashboardController;

// Authentication Routes
Auth::routes();


// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Buildings
    Route::resource('buildings', BuildingController::class);

    // Lands
    Route::resource('lands', LandController::class);
    Route::get('lands/{land}/buildings', [LandController::class, 'showBuildings'])->name('lands.buildings');

    // Landmarks
    Route::resource('landmarks', LandmarkController::class);
});


