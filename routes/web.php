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
// ! Resource routes
Route::resource('developers', DevelopersController::class);
Route::resource('companies', CompaniesController::class);
Route::resource('projects', ProjectsController::class);


// ? Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DevelopersController::class, 'profileDeveloper'])->name('dashboard');
    Route::get('/skills', [SkillsController::class, 'profileSkills'])->name('profile.skills');
});

// Route::get('/dashboard', [DevelopersController::class, 'profileDeveloper'])
// ->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';