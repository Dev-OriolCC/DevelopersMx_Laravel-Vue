<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index() {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function developers(){ 
        return Inertia::render('Developers/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function developer($id){ 
        return Inertia::render('Developers/Developer');
    }

    public function projects(){ 
        return Inertia::render('Projects/Index');
    }

    public function project($id){
        return Inertia::render('Projects/Project');
    }

    public function companies(){ 
        return Inertia::render('Companies/Index');
    }

    public function company($id){
        return Inertia::render('Companies/Company');
    }
}
