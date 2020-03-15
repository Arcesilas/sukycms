<?php

use App\Http\Controllers\Admin\UserController;

Route::resource('users', UserController::class);

Route::get('users/configuration', [UserController::class, 'configuration'])->name('users.configuration');
