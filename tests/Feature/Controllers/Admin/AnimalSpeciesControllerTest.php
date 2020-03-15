<?php

namespace Tests\Feature\Controllers\Admin;

use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\AnimalSpeciesController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\TestCrud;
use Tests\TestCase;

class AnimalSpeciesControllerTest extends TestCase
{
    use RefreshDatabase, TestCrud;

    protected string $controller = AnimalSpeciesController::class;
}
