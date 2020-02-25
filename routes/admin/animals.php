<?php

use App\Http\Controllers\Admin\AnimalConfigurationController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\AnimalLocationController;
use App\Http\Controllers\Admin\AnimalSexController;
use App\Http\Controllers\Admin\AnimalSpeciesController;
use App\Http\Controllers\Admin\BehaviorController;

Route::resource('animals', AnimalController::class);

Route::group(['as' => 'animals.', 'prefix' => 'animals/configuration'], static function () {
    Route::get('/', [AnimalConfigurationController::class, 'configuration'])->name('configuration');

    Route::resource('sexes', AnimalSexController::class);
    Route::orderable('sexes', 'sex', AnimalSexController::class);

    Route::resource('locations', AnimalLocationController::class);
    Route::orderable('locations', 'location', AnimalLocationController::class);

    Route::resource('species', AnimalSpeciesController::class);
    Route::orderable('species', 'species', AnimalSpeciesController::class);

    Route::resource('behaviors', BehaviorController::class);
    Route::orderable('behaviors', 'behavior', BehaviorController::class);
});
