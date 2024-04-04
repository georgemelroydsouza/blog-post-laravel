<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Changed from welcome to home
    return view('home');
});
