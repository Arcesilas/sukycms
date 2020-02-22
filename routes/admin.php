<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShelterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebController;

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/activity-log', [DashboardController::class, 'activity_log'])->name('activity_log');

Route::group(['prefix' => 'shelter', 'as' => 'shelter.'], static function () {
    Route::get('/', [ShelterController::class, 'form'])->name('form');
    Route::put('/', [ShelterController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'animals', 'as' => 'animals.'], static function () {
    include 'admin/animals.php';
});

include 'admin/users.php';

Route::group(['prefix' => 'web', 'as' => 'web.'], static function () {
    Route::get('/', [WebController::class, 'index'])->name('index');
});
