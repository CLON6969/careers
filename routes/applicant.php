<?php
// public controllers
use App\Http\Controllers\{
OnboardingController,
DashboardController


};

 // Applicant-only routes...

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


Route::middleware(['auth', 'role:4'])->prefix('applicant')->name('applicant.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'applicant'])->name('dashboard');
    // Applicant-only routes...

    Route::view('/loading_count_down', 'loading_count_down');
});



