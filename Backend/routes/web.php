<?php

use App\Http\Controllers\Api\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('api')->group(function () {
    Route::get('/notes', [NoteController::class, 'index']);
});