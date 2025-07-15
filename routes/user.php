<?php
// public controllers
use App\Http\Controllers\{
DashboardController


};

// User-only routes...
Route::middleware(['auth', 'role:3'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'user'])->name('dashboard');
    // User-only routes...
    Route::view('/loading_count_down', 'loading_count_down');
});
