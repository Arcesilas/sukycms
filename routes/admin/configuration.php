<?php

use App\Http\Controllers\Admin\Configuration\ModuleController;

Route::redirect('configuration', 'configuration/modules')->name('configuration.index');

Route::group(['prefix' => 'configuration', 'as' => 'configuration.'], function () {
    Route::get('modules', [ModuleController::class, 'index'])->name('modules.index');
});

