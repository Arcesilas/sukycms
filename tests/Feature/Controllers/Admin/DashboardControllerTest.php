<?php

namespace Tests\Feature\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard()
    {
        $admin =$this->createAdmin();

        $this
            ->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk();
    }
}
