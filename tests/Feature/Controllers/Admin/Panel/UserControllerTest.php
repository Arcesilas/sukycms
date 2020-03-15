<?php

namespace Tests\Feature\Controllers\Admin;

use App\Http\Controllers\Admin\Panel\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\TestCrud;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase, TestCrud;

    protected string $controller = UserController::class;
}
