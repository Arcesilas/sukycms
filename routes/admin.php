<?php

use App\Http\Controllers\Admin\Panel\DashboardController;
use App\Http\Controllers\Admin\Panel\ShelterController;
use App\Http\Controllers\Admin\Panel\WebController;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::group(['prefix' => 'panel'], function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/activity-log', [DashboardController::class, 'activity_log'])->name('activity_log');

    Route::group(['prefix' => 'shelter', 'as' => 'shelter.'], static function () {
        Route::get('/', [ShelterController::class, 'form'])->name('form');
        Route::put('/', [ShelterController::class, 'update'])->name('update');
    });

    include 'admin/animals.php';
    include 'admin/users.php';
    include 'admin/posts.php';
    include 'admin/pages.php';
});

include 'admin/configuration.php';

Route::group(['prefix' => 'web', 'as' => 'web.'], static function () {
    Route::get('/', [WebController::class, 'index'])->name('index');
});
