<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\BookController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Middleware\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Public Routes (Guest & Umum)
|--------------------------------------------------------------------------
*/

// Book Detail
Route::get('/book/{slug}', [BookController::class, 'show'])
    ->name('book.show');

// Landing Page
Route::view('/', 'welcome')->name('home');


// Category Landing (Atomic Page)
Route::get('/category', [CategoryController::class, 'index'])
    ->name('category.index');

// Category Detail
Route::get('/category/{slug}', [CategoryController::class, 'show'])
    ->name('category.show');


// Social Auth (Guest Only)
Route::middleware('guest')->controller(SocialAuthController::class)->group(function () {
    Route::get('/auth/google', 'redirect')->name('auth.google');
    Route::get('/auth/google/callback', 'callback');

    Route::get('/auth/github', 'redirectGithub')->name('auth.github');
    Route::get('/auth/github/callback', 'callbackGithub');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // User Dashboard / Jelajah
    Route::get('/jelajah', [BookController::class, 'index'])
        ->name('jelajah');

    // Alias dashboard (anti error Socialite / default Laravel)
    Route::redirect('/dashboard', '/jelajah')->name('dashboard');

    // Profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', RoleMiddleware::class . ':admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
    });

/*
|--------------------------------------------------------------------------
| Auth Scaffolding (Laravel Breeze / Jetstream)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
