<?php

use App\Http\Controllers\HomeController;
// Controllers Creados
use App\Http\Controllers\DevelopersController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SkillsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// admin@mail.com
// admin100

// company@mail.com
// company100
// TODO: NOTES/FEATURES/BUGS
// ! fix the bug with company login in and out


//  ? Public Routes

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/api', [HomeController::class, 'api'])->name('api');
Route::get('/developers/search/{name}/{id}', [DevelopersController::class, 'search'])->name('developers.search');

// ! Resource Routes
Route::resource('developers', DevelopersController::class)->only(['index', 'show']);
Route::resource('projects', ProjectsController::class)->only(['index', 'show']);
Route::resource('companies', CompaniesController::class)->only(['index', 'show']);

// ? Authenticated Routes for Developer
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DevelopersController::class, 'profileDeveloper'])->name('dashboard');//* Main auth index
    // ! Resource Routes
    Route::resource('skills', SkillsController::class);
    Route::resource('developers', DevelopersController::class)->except(['index', 'show']);
    Route::resource('projects', ProjectsController::class)->except(['index', 'show']);

    // Replace-update methods
    Route::post('projects/updateProject/{id}', [ProjectsController::class, 'updateProject'])->name('updateProject'); //* replace-update
    Route::post('developers/updateDeveloper/{id}', [DevelopersController::class, 'updateDeveloper'])->name('developers.updateDeveloper'); //* replace-update

    // ? Profile routes
    Route::get('/skillsProfile', [SkillsController::class, 'profileSkills'])->name('profile.skills');
    route::get('/projectsProfile', [ProjectsController::class, 'profileProjects'])->name('profile.projects');
});

// ? Authenticated Routes for Company
    Route::middleware('auth:company')->group(function () {
        Route::resource('companies', CompaniesController::class)->except(['index', 'show']);
        Route::get('/dashboard-company', [CompaniesController::class, 'companyDashboard'])->name('companies.dashboard');
        Route::get('/company-profile', [CompaniesController::class, 'companyProfile'])->name('company.profile');
        // *
        Route::get('/jobs-company', [CompaniesController::class, 'jobsDashboard'])->name('companies.jobs');
        Route::get('/jobs-create', [CompaniesController::class, 'jobCreate'])->name('jobs.create');
        Route::post('/jobs-store', [CompaniesController::class, 'jobStore'])->name('jobs.store');
        Route::get('/jobs-edit/{id}', [CompaniesController::class, 'jobEdit'])->name('jobs.edit'); //!
        Route::post('/jobs-update/{id}', [CompaniesController::class, 'jobUpdate'])->name('jobs.update');
        Route::delete('/jobs-delete/{id}', [CompaniesController::class, 'jobDelete'])->name('jobs.delete');

    });


require __DIR__.'/auth.php';