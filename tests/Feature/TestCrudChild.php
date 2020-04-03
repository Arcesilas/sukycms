<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Support\Crud\CrudChild;

trait TestCrudChild
{
    public function test_has_crud_trait(): void
    {
        $this->assertTrue(
            in_array(CrudChild::class, class_uses($this->controller))
        );
    }

    public function test_has_parentRelationship_property(): void
    {
        $this->assertTrue(
            property_exists($this->controller, 'parentRelationship')
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
        $animal = factory(Animal::class)->create();
        $controller = app($this->controller);

        $items = factory($controller->getModel(), 20)->create([
            'animal_id' => $animal->id,
        ]);

        $this
            ->actingAs($admin)
            ->get(action([$this->controller, 'index'], $animal))
            ->assertSeeText((string)$items[0])
            ->assertOk();
    }

    public function test_index_search(): void
    {
        $admin = $this->createAdmin();
        $controller = app($this->controller);

        $items = factory($controller->getModel(), 20)->create();

        $this
            ->actingAs($admin)
            ->get(action([$this->controller, 'index'], ['q' => (string)$items[0]]))
            ->assertSeeText(__("{$controller->getNamespace()}.list"))
            ->assertSeeText((string)$items[0])
            ->assertDontSeeText((string)$items[1])
            ->assertDontSeeText((string)$items[2])
            ->assertOk();
    }
}
