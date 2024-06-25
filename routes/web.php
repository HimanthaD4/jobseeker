<?php

use App\Http\Controllers\ProfileController;
use App\Http\controllers\JobController;
use App\Http\Controllers\JobApplicationController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('jobs',JobController::class)->middleware('auth');

Route::get('/dashboard', [JobController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'store'])->name('jobs.apply')->middleware('auth');
Route::delete('/applications/{jobApplication}', [JobApplicationController::class, 'destroy'])->name('applications.destroy')->middleware('auth');

require __DIR__.'/auth.php';
