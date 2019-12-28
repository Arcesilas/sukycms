<?php

use App\Http\Controllers\Admin\AnimalConfigurationController;
use App\Http\Controllers\Admin\AnimalController;

Route::get('/', [AnimalController::class, 'index'])->name('index');
Route::get('/create', [AnimalController::class, 'create'])->name('create');
Route::post('/', [AnimalController::class, 'store'])->name('store');
Route::get('/{animal}/edit', [AnimalController::class, 'edit'])->name('edit');

Route::group(['prefix' => 'configuration'], static function () {
    Route::get('/', [AnimalConfigurationController::class, 'configuration'])->name('configuration');
    Route::get('/sexes', [AnimalConfigurationController::class, 'sexes'])->name('sexes');
    Route::get('/locations', [AnimalConfigurationController::class, 'locations'])->name('locations');
    Route::get('/species', [AnimalConfigurationController::class, 'species'])->name('species');
    Route::get('/behaviors', [AnimalConfigurationController::class, 'behaviors'])->name('behaviors');
});
