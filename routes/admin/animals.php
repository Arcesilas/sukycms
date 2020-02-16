<?php

use App\Http\Controllers\Admin\AnimalConfigurationController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\AnimalLocationController;
use App\Http\Controllers\Admin\AnimalSexController;
use App\Http\Controllers\Admin\AnimalSpeciesController;
use App\Http\Controllers\Admin\BehaviorController;

Route::get('/', [AnimalController::class, 'index'])->name('index');
Route::get('/create', [AnimalController::class, 'create'])->name('create');
Route::post('/', [AnimalController::class, 'store'])->name('store');
Route::get('/{animal}/edit', [AnimalController::class, 'edit'])->name('edit');
Route::put('/{animal}', [AnimalController::class, 'update'])->name('update');

Route::group(['prefix' => 'configuration'], static function () {
    Route::get('/', [AnimalConfigurationController::class, 'configuration'])->name('configuration');

    Route::resource('sexes', AnimalSexController::class);
    Route::resource('locations', AnimalLocationController::class);
    Route::resource('species', AnimalSpeciesController::class);
    Route::resource('behaviors', BehaviorController::class);
});
