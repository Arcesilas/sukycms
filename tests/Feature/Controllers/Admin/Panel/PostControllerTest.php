<?php

namespace Tests\Feature\Controllers\Admin;

use App\Http\Controllers\Admin\Panel\PostController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\TestCrud;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase, TestCrud;

    protected string $controller = PostController::class;
}
