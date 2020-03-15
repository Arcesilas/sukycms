<?php

namespace Tests\Feature\Controllers\Admin;

use App\Http\Controllers\Admin\Panel\AnimalController;
use App\Http\Controllers\Admin\Panel\AnimalSexController;
use App\Http\Controllers\Admin\Panel\AnimalSpeciesController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\TestCrud;
use Tests\TestCase;

class AnimalSexControllerTest extends TestCase
{
    use RefreshDatabase, TestCrud;

    protected string $controller = AnimalSexController::class;
}
