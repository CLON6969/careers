<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    OnboardingController,
    DashboardController,
};
 use App\Http\Controllers\Web\OverviewController;

use App\Http\Controllers\User\{
    ApplicantProfileController,
    ApplicantLocationController,
    ExperienceController,
    EducationController,
    ApplicantCertificationController,
    VoluntaryDisclosureController,
    CareerDashboardController,
};

// Applicant-only onboarding routes
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

// Applicant dashboard & profile CRUD routes
Route::middleware(['auth', 'role:4'])->prefix('user/applicant')->name('user.applicant.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'applicant'])->name('dashboard');
     Route::get('/dashboard/overview', [CareerDashboardController::class, 'index'])->name('dashboard.overview');



    Route::view('/loading_count_down', 'loading_count_down');

    // Full resource routes for all applicant-related models
    Route::resource('profile', ApplicantProfileController::class);
    Route::resource('locations', ApplicantLocationController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('certifications', ApplicantCertificationController::class);
        Route::get('voluntary_disclosures/edit', [VoluntaryDisclosureController::class, 'edit'])->name('voluntary_disclosures.edit');
    Route::put('voluntary_disclosures', [VoluntaryDisclosureController::class, 'update'])->name('voluntary_disclosures.update');


// Full resource route for Overview of an applicant
     Route::get('/overviews', [OverviewController::class, 'index'])->name('overviews.index');








});
