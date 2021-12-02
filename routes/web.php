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


//  ? Public Routes

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/api', [HomeController::class, 'api'])->name('api');
Route::resource('developers', DevelopersController::class)->only(['index', 'show']);

// ! Resource routes
Route::resource('companies', CompaniesController::class);
Route::resource('projects', ProjectsController::class);

// ? Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DevelopersController::class, 'profileDeveloper'])->name('dashboard');//* Main auth index
    Route::resource('skills', SkillsController::class);
    Route::resource('developers', DevelopersController::class)->except(['index', 'show']);

    Route::post('projects/updateProject/{id}', [ProjectsController::class, 'updateProject'])->name('updateProject'); //* replace-update
    Route::post('developers/updateDeveloper/{id}', [DevelopersController::class, 'updateDeveloper'])->name('developers.updateDeveloper'); //* replace-update

    // ? Profile routes
    Route::get('/skillsProfile', [SkillsController::class, 'profileSkills'])->name('profile.skills');
    route::get('/projectsProfile', [ProjectsController::class, 'profileProjects'])->name('profile.projects');
});


require __DIR__.'/auth.php';