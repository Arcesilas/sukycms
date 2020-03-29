<?php

use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\AnimalHealthController;
use App\Http\Controllers\Admin\AnimalLocationController;
use App\Http\Controllers\Admin\AnimalPhotoController;
use App\Http\Controllers\Admin\AnimalSexController;
use App\Http\Controllers\Admin\AnimalSpeciesController;
use App\Http\Controllers\Admin\AnimalStatusController;
use App\Http\Controllers\Admin\BehaviorController;

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

Route::group(['as' => 'animals.', 'prefix' => 'animals/{animal}'], static function () {
    Route::resource('health', AnimalHealthController::class);

    Route::group(['as' => 'photos.', 'prefix' => 'photos'], function () {
        Route::get('/', [AnimalPhotoController::class, 'index'])->name('index');
    });
});

Route::resource('animals', AnimalController::class);
