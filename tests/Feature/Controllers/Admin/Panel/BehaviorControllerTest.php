<?php

namespace Tests\Feature\Controllers\Admin;

use App\Http\Controllers\Admin\Panel\AnimalController;
use App\Http\Controllers\Admin\Panel\AnimalLocationController;
use App\Http\Controllers\Admin\Panel\AnimalSexController;
use App\Http\Controllers\Admin\Panel\AnimalSpeciesController;
use App\Http\Controllers\Admin\Panel\BehaviorController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\TestCrud;
use Tests\TestCase;

class BehaviorControllerTest extends TestCase
{
    use RefreshDatabase, TestCrud;

    protected string $controller = BehaviorController::class;
}
