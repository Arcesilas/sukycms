<?php

use App\Http\Controllers\Admin\UserController;

Route::resource('', UserController::class);

Route::group(['prefix' => 'configuration'], static function () {
    Route::get('/', [UserController::class, 'configuration'])->name('configuration');
});