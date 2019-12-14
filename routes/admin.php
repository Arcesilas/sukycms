<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShelterController;
use App\Http\Controllers\Admin\WebController;

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'shelter', 'as' => 'shelter.'], static function () {
    Route::get('/', [ShelterController::class, 'form'])->name('form');
    Route::put('/', [ShelterController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'web', 'as' => 'web.'], static function () {
    Route::get('/', [WebController::class, 'index'])->name('index');
});
