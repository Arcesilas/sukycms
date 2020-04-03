<?php

namespace Tests\Feature\Controllers\Admin;

use App\Http\Controllers\Admin\AnimalHealthController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\TestCrudChild;
use Tests\TestCase;

class AnimalHealthControllerTest extends TestCase
{
    use RefreshDatabase, TestCrudChild;

    protected string $controller = AnimalHealthController::class;
}
