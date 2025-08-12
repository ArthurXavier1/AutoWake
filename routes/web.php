<?php

use Illuminate\Support\Facades\Route;


Route::get('/inicial', function () {
    return view('inicial');
});

Route::get('/login', function () {
    return view('Login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
