<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WebController;

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'web', 'as' => 'web.'], static function () {
    Route::get('/', [WebController::class, 'index'])->name('index');
});
