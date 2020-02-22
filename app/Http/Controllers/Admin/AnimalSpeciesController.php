<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AnimalSpeciesFilters;
use App\Models\AnimalSpecies;
use App\Support\Crud\Crud;
use App\Support\Crud\Fields\Text;
use App\Support\Orderable;
use Illuminate\Support\Collection;

class AnimalSpeciesController extends AdminBaseController
{
    use Crud, Orderable;

    protected string $model = AnimalSpecies::class;

    protected string $namespace = 'animals.species';

    public function indexQuery(): Collection
    {
        return AnimalSpecies::withCount('animals')
            ->filter(app(AnimalSpeciesFilters::class))
            ->orderBy('order')
            ->get();
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
