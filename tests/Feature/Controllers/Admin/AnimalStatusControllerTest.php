<?php

namespace Tests\Feature\Controllers\Admin;

use App\Http\Controllers\Admin\AnimalStatusController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\TestCrud;
use Tests\TestCase;

class AnimalStatusControllerTest extends TestCase
{
    use RefreshDatabase, TestCrud;

    protected string $controller = AnimalStatusController::class;
}
