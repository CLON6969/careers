<?php

// Public Controllers
use App\Http\Controllers\{
    DashboardController,
  
};

// Web Controllers
use App\Http\Controllers\Web\{
    WebJobPostController,
    WebHomepageContentController,
    WebOpportunityController,
    WebLegalController,
    WebJobApplicationController
};

use App\Http\Controllers\Web\General\{
    FooterController,
    SocialController,
    LogoController,
    PartnersController,
    Nav1Controller
};

Route::middleware(['auth', 'role:1'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    Route::view('/loading_count_down', 'loading_count_down')->name('loading_count_down');

Route::get('/job-user-summary', [DashboardController::class, 'jobUserSummary'])->name('admin.job_user_summary');




    // --- Applications Management ---
    Route::prefix('applications')->name('web.applications.')->group(function () {
        Route::get('/', [WebJobApplicationController::class, 'index'])->name('index');
        Route::get('/{job}/applicants', [WebJobApplicationController::class, 'applicants'])->name('applicants');
        Route::get('/applicant/{application}', [WebJobApplicationController::class, 'show'])->name('show');
        Route::put('/applicant/{application}/update', [WebJobApplicationController::class, 'updateStatus'])->name('update');
    });

    // --- Job Post Management ---
    Route::prefix('job')->name('web.job.')->group(function () {
        Route::get('/userview', [WebJobPostController::class, 'userview'])->name('userview');
        Route::get('/', [WebJobPostController::class, 'index'])->name('index');
        Route::get('/create', [WebJobPostController::class, 'create'])->name('create');
        Route::post('/', [WebJobPostController::class, 'store'])->name('store');
        Route::get('/{job}/edit', [WebJobPostController::class, 'edit'])->name('edit');
        Route::put('/{job}', [WebJobPostController::class, 'update'])->name('update');
        Route::get('/job/all-posts', [WebJobPostController::class, 'allPosts'])->name('allPosts');
        Route::delete('/{job}', [WebJobPostController::class, 'destroy'])->name('destroy');
    });

    // --- Homepage Content Management ---
    Route::prefix('web/homepage')->name('web.homepage.')->group(function () {
        Route::get('/content/edit', [WebHomepageContentController::class, 'edit'])->name('content.edit');
        Route::post('/content/update', [WebHomepageContentController::class, 'update'])->name('content.update');
    });

    Route::prefix('web/homepage/table')->name('web.homepage.table.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Web\WebHomepageContentTableController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Web\WebHomepageContentTableController::class, 'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Web\WebHomepageContentTableController::class, 'store'])->name('store');
        Route::get('/{table}/edit', [\App\Http\Controllers\Web\WebHomepageContentTableController::class, 'edit'])->name('edit');
        Route::post('/{table}/update', [\App\Http\Controllers\Web\WebHomepageContentTableController::class, 'update'])->name('update');
        Route::delete('/{table}', [\App\Http\Controllers\Web\WebHomepageContentTableController::class, 'destroy'])->name('destroy');
    });

    // --- Opportunity Management ---
    Route::prefix('web/opportunities')->name('web.opportunities.')->group(function () {
        Route::get('/', [WebOpportunityController::class, 'index'])->name('index');
        Route::get('/create', [WebOpportunityController::class, 'create'])->name('create');
        Route::post('/', [WebOpportunityController::class, 'store'])->name('store');
        Route::get('/{opportunity}/edit', [WebOpportunityController::class, 'edit'])->name('edit');
        Route::put('/{opportunity}', [WebOpportunityController::class, 'update'])->name('update');
        Route::delete('/{opportunity}', [WebOpportunityController::class, 'destroy'])->name('destroy');
    });

    // --- Legal (Privacy & Terms) ---
    Route::prefix('web/legal')->name('web.legal.')->group(function () {
        Route::get('/', [WebLegalController::class, 'index'])->name('index');
        Route::get('/create', [WebLegalController::class, 'create'])->name('create');
        Route::post('/', [WebLegalController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [WebLegalController::class, 'edit'])->name('edit');
        Route::put('/{id}', [WebLegalController::class, 'update'])->name('update');
        Route::delete('/{id}', [WebLegalController::class, 'destroy'])->name('destroy');
    });

    // --- General Footer ---
    Route::prefix('web/general/footer')->name('web.general.footer.')->group(function () {
        Route::get('/titles', [FooterController::class, 'titleIndex'])->name('titles.index');
        Route::get('/titles/create', [FooterController::class, 'titleCreate'])->name('titles.create');
        Route::post('/titles/store', [FooterController::class, 'titleStore'])->name('titles.store');
        Route::get('/titles/{title}/edit', [FooterController::class, 'titleEdit'])->name('titles.edit');
        Route::put('/titles/{title}/update', [FooterController::class, 'titleUpdate'])->name('titles.update');
        Route::delete('/titles/{title}', [FooterController::class, 'titleDestroy'])->name('titles.destroy');

        Route::get('/items', [FooterController::class, 'itemIndex'])->name('items.index');
        Route::get('/items/create', [FooterController::class, 'itemCreate'])->name('items.create');
        Route::post('/items/store', [FooterController::class, 'itemStore'])->name('items.store');
        Route::get('/items/{item}/edit', [FooterController::class, 'itemEdit'])->name('items.edit');
        Route::put('/items/{item}/update', [FooterController::class, 'itemUpdate'])->name('items.update');
        Route::delete('/items/{item}', [FooterController::class, 'itemDestroy'])->name('items.destroy');
    });

    // --- General Socials ---
    Route::prefix('web/general/socials')->name('web.general.socials.')->group(function () {
        Route::get('/', [SocialController::class, 'index'])->name('index');
        Route::get('/create', [SocialController::class, 'create'])->name('create');
        Route::post('/store', [SocialController::class, 'store'])->name('store');
        Route::get('/{social}/edit', [SocialController::class, 'edit'])->name('edit');
        Route::put('/{social}', [SocialController::class, 'update'])->name('update');
        Route::delete('/{social}', [SocialController::class, 'destroy'])->name('destroy');
    });

    // --- General Logo ---
    Route::prefix('web/general/logo')->name('web.general.logo.')->group(function () {
        Route::get('/', [LogoController::class, 'index'])->name('index');
        Route::get('/create', [LogoController::class, 'create'])->name('create');
        Route::post('/store', [LogoController::class, 'store'])->name('store');
        Route::get('/{logo}/edit', [LogoController::class, 'edit'])->name('edit');
        Route::put('/{logo}/update', [LogoController::class, 'update'])->name('update');
        Route::delete('/{logo}/delete', [LogoController::class, 'destroy'])->name('destroy');
    });

    // --- General Nav1 ---
Route::prefix('web/general/nav1')->name('web.general.nav1.')->group(function () {
    Route::get('/', [Nav1Controller::class, 'index'])->name('index');
    Route::get('/create', [Nav1Controller::class, 'create'])->name('create');
    Route::post('/store', [Nav1Controller::class, 'store'])->name('store');
    Route::get('/{nav1}/edit', [Nav1Controller::class, 'edit'])->name('edit');
    Route::put('/{nav1}/update', [Nav1Controller::class, 'update'])->name('update');
    Route::delete('/{nav1}/delete', [Nav1Controller::class, 'destroy'])->name('destroy');
});


    // --- General Partners ---
    Route::prefix('web/general/partners')->name('web.general.partners.')->group(function () {
        Route::get('/', [PartnersController::class, 'index'])->name('index');
        Route::get('/create', [PartnersController::class, 'create'])->name('create');
        Route::post('/store', [PartnersController::class, 'store'])->name('store');
        Route::get('/{partner}/edit', [PartnersController::class, 'edit'])->name('edit');
        Route::put('/{partner}/update', [PartnersController::class, 'update'])->name('update');
        Route::delete('/{partner}/delete', [PartnersController::class, 'destroy'])->name('destroy');
    });
});
