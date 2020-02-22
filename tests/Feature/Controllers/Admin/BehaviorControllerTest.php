<?php

namespace Tests\Feature\Controllers\Admin;

use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\AnimalLocationController;
use App\Http\Controllers\Admin\AnimalSexController;
use App\Http\Controllers\Admin\AnimalSpeciesController;
use App\Http\Controllers\Admin\BehaviorController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\TestCrud;
use Tests\TestCase;

class BehaviorControllerTest extends TestCase
{
    use RefreshDatabase, TestCrud;

    protected string $controller = BehaviorController::class;
}
