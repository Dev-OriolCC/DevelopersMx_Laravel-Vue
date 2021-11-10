<?php

use App\Http\Controllers\HomeController;
// Controllers Creados
use App\Http\Controllers\DevelopersController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ProjectsController;

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

Route::get('/dashboard', function () {
    // ! Testing relationship..
    // dd(Auth::user()->developer->type_developer);
    return Inertia::render('Dashboard', ['developer' => Auth::user()->developer]);
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';