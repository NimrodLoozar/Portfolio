<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ThemeLogController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dropdown-test', function () {
    return view('dropdown-test');
})->name('dropdown.test');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/project/{id}', [ProjectsController::class, 'show'])->name('projects.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/projects/new', [ProjectsController::class, 'create'])->name('projects.create'); // Ensure this line is correct
    Route::get('/dashboard/projects', [ProjectsController::class, 'index'])->name('projects.index');
    Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::patch('/projects/{id}', [ProjectsController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
    Route::post('/project/preview', [ProjectsController::class, 'preview'])->name('projects.preview');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/log-theme-switch', [ThemeLogController::class, 'logSwitch']);
});

// Public route for theme event logging (no auth required)
Route::post('/log-theme-event', [ThemeLogController::class, 'logEvent']);

require __DIR__ . '/auth.php';
