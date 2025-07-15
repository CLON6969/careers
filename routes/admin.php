<?php

// public controllers
use App\Http\Controllers\{
DashboardController


};


 // Admin-only routes...

Route::middleware(['auth', 'role:1'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    // Admin-only routes...

     Route::view('/loading_count_down', 'loading_count_down')->name('loading_count_down');
});



