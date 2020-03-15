<?php

namespace Tests\Feature\Controllers\Admin;

use App\Http\Controllers\Admin\Panel\PageController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\TestCrud;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    use RefreshDatabase, TestCrud;

    protected string $controller = PageController::class;
}
