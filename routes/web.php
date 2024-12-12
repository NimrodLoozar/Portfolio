<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/project', function () {
    return view('project');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

// ...existing code...

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// ...existing code...

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/project/new', [ProjectsController::class, 'create'])->name('projects.create');
    Route::post('/project', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/project/{id}', [ProjectsController::class, 'show'])->name('projects.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
