<?php

use App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'form'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::match(['GET', 'POST'], 'logout', [LoginController::class, 'logout'])->name('logout');
