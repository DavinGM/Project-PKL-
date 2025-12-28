<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\RoleMiddleware;






// Profile
Route::middleware(['auth'])
->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


// Google
Route::get('/auth/google', [SocialAuthController::class, 'redirect'])
->middleware('guest');

Route::get('/auth/google/callback', [SocialAuthController::class, 'callback'])
->middleware('guest');

// github
Route::get('auth/github', [SocialAuthController::class, 'redirectGithub']);
Route::get('auth/github/callback', [SocialAuthController::class, 'callbackGithub']);
    
    
// admin
Route::middleware(['auth', RoleMiddleware::class . ':admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
    });



// gak tau
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

require __DIR__.'/auth.php';
