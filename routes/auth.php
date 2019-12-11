<?php

use App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'form'])
    ->middleware('guest')
    ->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::match(['GET', 'POST'], 'logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
