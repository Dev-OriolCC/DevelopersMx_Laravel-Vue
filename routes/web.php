<?php

use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// admin@mail.com
// admin100

//  ? Public Routes

Route::get('/', [HomeController::class, 'index'])->name('index');
// ! Test
Route::get('/developers', [HomeController::class, 'developers'])->name('developers');
Route::get('/developer/{id}', [HomeController::class, 'developer'])->name('developer');
Route::get('/projects', [HomeController::class, 'projects'])->name('projects');
Route::get('/project/{id}', [HomeController::class, 'project'])->name('project');
Route::get('/companies', [HomeController::class, 'companies'])->name('companies');
Route::get('/company/{id}', [HomeController::class, 'company'])->name('company');
// About
// API-REST
// 


// ? Authenticated Routes
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';