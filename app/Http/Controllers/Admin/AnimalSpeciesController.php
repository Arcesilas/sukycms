<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalSex;
use App\Models\AnimalSpecies;
use App\Support\Crud\Crud;
use App\Support\Crud\Fields\Text;
use Illuminate\Support\Collection;

class AnimalSpeciesController extends AdminBaseController
{
    use Crud;

    protected string $model = AnimalSpecies::class;

    protected string $namespace = 'animals.species';

    public function indexQuery(): Collection
    {
        return AnimalSpecies::withCount('animals')->get();
    }

    public function fields(): array
    {
        return [
            (new Text)->make('species'),
            (new Text)->align('right')->make('animals_count'),
            (new Text)->align('center')->make('order'),
            (new Text)->align('right')->make('actions'),
        ];
    }
}
