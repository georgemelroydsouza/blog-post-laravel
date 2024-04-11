<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/posts/create', 'create');
    Route::get('/posts/{Post}', 'show');
    Route::post('/posts', 'store');
    Route::get('/posts/{Post}/edit', 'edit');
    Route::patch('/posts/{Post}', 'update');
    Route::delete('/posts/{Post}', 'destroy');
});


Route::view('/about', 'about');
