<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Models baing used 
use App\Models\{
    LegalDocument,
};

// public controllers
use App\Http\Controllers\{
HomeController,
JobController,
OnboardingController,
DashboardController


};


Route::get('/', [HomeController::class, 'index']);


Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{slug}', [JobController::class, 'show'])->name('jobs.show');



// routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/apply/{slug}', [ApplicationController::class, 'create'])->name('jobs.apply');
});






Route::get('/legal/{slug}', function ($slug) {
    $document = LegalDocument::where('slug', $slug)->with(['sections.listItems'])->firstOrFail();
    return view('legal.show', compact('document'));
})->name('legal.show');








// routes/web.php
Route::middleware(['auth', 'verified', 'ensure.applicant'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});








Route::middleware(['auth', 'ensure.applicant'])->prefix('onboarding')->name('onboarding.')->group(function () {
    Route::get('step1', [OnboardingController::class, 'step1'])->name('step1');
    Route::post('step1', [OnboardingController::class, 'postStep1'])->name('postStep1');

    Route::get('step2', [OnboardingController::class, 'step2'])->name('step2');
    Route::post('step2', [OnboardingController::class, 'postStep2'])->name('postStep2');

    Route::get('step3', [OnboardingController::class, 'step3'])->name('step3');
    Route::post('step3', [OnboardingController::class, 'postStep3'])->name('postStep3');

    Route::get('step4', [OnboardingController::class, 'step4'])->name('step4');
    Route::post('step4', [OnboardingController::class, 'postStep4'])->name('postStep4');

    Route::get('step5', [OnboardingController::class, 'step5'])->name('step5');
    Route::post('step5', [OnboardingController::class, 'postStep5'])->name('postStep5');

    Route::get('review', [OnboardingController::class, 'review'])->name('review');
    Route::post('submit', [OnboardingController::class, 'submit'])->name('submit');
});









require __DIR__.'/auth.php';
