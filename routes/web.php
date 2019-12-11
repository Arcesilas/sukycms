<?php

use App\Http\Controllers\Web\HomeController;

Route::get('/', [HomeController::class, 'home'])->name('home');
