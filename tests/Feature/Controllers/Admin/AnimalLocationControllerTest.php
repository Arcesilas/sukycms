<?php

namespace Tests\Feature\Controllers\Admin;

use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\AnimalLocationController;
use App\Http\Controllers\Admin\AnimalSexController;
use App\Http\Controllers\Admin\AnimalSpeciesController;
use App\Models\Animal;
use App\Models\AnimalLocation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\TestCrud;
use Tests\TestCase;

class AnimalLocationControllerTest extends TestCase
{
    use RefreshDatabase, TestCrud;

    protected string $controller = AnimalLocationController::class;

    /** @test */
    public function destroy_location_and_select_other_location_for_its_animals(): void
    {
        $admin = $this->createAdmin();
        $locationToDestroy = factory(AnimalLocation::class)->create();
        $location = factory(AnimalLocation::class)->create();

        factory(Animal::class, 25)->create([
            'location_id' => $locationToDestroy->id,
        ]);

        $this->assertEquals(25, $locationToDestroy->animals()->count());
        $this->assertEquals(0, $location->animals()->count());

        $this->actingAs($admin)
            ->delete(route('admin.animals.locations.destroy', $locationToDestroy), [
                'model_id' => $location->id,
            ]);

        $this->assertEquals(0, $locationToDestroy->animals()->count());
        $this->assertEquals(25, $location->animals()->count());
    }

    /** @test */
    public function can_not_destroy_last_location()
    {
        $admin = $this->createAdmin();
        $locationToDestroy = factory(AnimalLocation::class)->create();

        factory(Animal::class, 25)->create([
            'location_id' => $locationToDestroy->id,
        ]);

        $this->assertEquals(25, $locationToDestroy->animals()->count());

        $this->actingAs($admin)
            ->delete(route('admin.animals.locations.destroy', $locationToDestroy), [
                'model_id' => $locationToDestroy->id,
            ]);

        $this->assertEquals(25, $locationToDestroy->animals()->count());
    }
}
