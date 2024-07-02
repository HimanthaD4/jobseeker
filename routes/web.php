<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('Home');
})->name('home')->middleware('auth');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Profile routes

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Job routes (using resourceful controller)
    Route::resource('jobs', JobController::class)->except(['create', 'show', 'destroy']);
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

    // Job application routes
    Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'store'])->name('jobs.apply');
    Route::delete('/applications/{jobApplication}', [JobApplicationController::class, 'destroy'])->name('applications.destroy');


    Route::get('/applications', [JobApplicationController::class, 'index'])->name('applications.index');
    Route::get('/chart', [ChartController::class, 'index']);

    // Dashboard route
    Route::get('/all', [JobController::class, 'all'])->name('all');
    Route::get('/dashboard', [JobController::class, 'dashboard'])->name('dashboard');
});

// Authentication routes
require __DIR__.'/auth.php';
