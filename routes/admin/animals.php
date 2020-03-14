<?php

use App\Http\Controllers\Admin\Panel\AnimalController;
use App\Http\Controllers\Admin\Panel\AnimalLocationController;
use App\Http\Controllers\Admin\Panel\AnimalSexController;
use App\Http\Controllers\Admin\Panel\AnimalSpeciesController;
use App\Http\Controllers\Admin\Panel\AnimalStatusController;
use App\Http\Controllers\Admin\Panel\BehaviorController;

Route::group(['as' => 'animals.', 'prefix' => 'animals/configuration'], static function () {
    Route::get('/', [AnimalController::class, 'configuration'])->name('configuration');

    Route::resource('sexes', AnimalSexController::class);
    Route::orderable('sexes', 'sex', AnimalSexController::class);

    Route::resource('locations', AnimalLocationController::class);
    Route::orderable('locations', 'location', AnimalLocationController::class);

    Route::resource('species', AnimalSpeciesController::class);
    Route::orderable('species', 'species', AnimalSpeciesController::class);

    Route::resource('behaviors', BehaviorController::class);
    Route::orderable('behaviors', 'behavior', BehaviorController::class);

    Route::resource('statuses', AnimalStatusController::class);
    Route::orderable('statuses', 'status', AnimalStatusController::class);
});

Route::resource('animals', AnimalController::class);
