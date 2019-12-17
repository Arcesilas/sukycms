<?php

use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShelterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebController;

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'shelter', 'as' => 'shelter.'], static function () {
    Route::get('/', [ShelterController::class, 'form'])->name('form');
    Route::put('/', [ShelterController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'animals', 'as' => 'animals.'], static function () {
    Route::get('/configuration', [AnimalController::class, 'configuration'])->name('configuration');
});

Route::group(['prefix' => 'users', 'as' => 'users.'], static function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::get('/configuration', [UserController::class, 'configuration'])->name('configuration');
});

Route::group(['prefix' => 'web', 'as' => 'web.'], static function () {
    Route::get('/', [WebController::class, 'index'])->name('index');
});
