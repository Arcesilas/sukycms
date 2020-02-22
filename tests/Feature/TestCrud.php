<?php

namespace Tests\Feature;

use App\Support\Crud\Crud;

trait TestCrud
{
    public function test_has_crud_trait(): void
    {
        $this->assertTrue(
            in_array(Crud::class, class_uses($this->controller))
        );
    }

    public function test_has_indexQuery_method(): void
    {
        $this->assertTrue(
            in_array('indexQuery', get_class_methods($this->controller))
        );
    }

    public function test_index(): void
    {
        $admin = $this->createAdmin();
        $controller = app($this->controller);

        $items = factory($controller->getModel(), 20)->create();

        $this
            ->actingAs($admin)
            ->get(action([$this->controller, 'index']))
            ->assertSeeText(__("{$controller->getNamespace()}.list"))
            ->assertSeeText((string) $items[0])
            ->assertOk();
    }
}
