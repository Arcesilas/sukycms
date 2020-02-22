<?php

namespace Tests\Feature\Controllers\Admin;

use App\Http\Controllers\Admin\AnimalController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\TestCrud;
use Tests\TestCase;

class AnimalControllerTest extends TestCase
{
    use RefreshDatabase, TestCrud;

    protected string $controller = AnimalController::class;
}
