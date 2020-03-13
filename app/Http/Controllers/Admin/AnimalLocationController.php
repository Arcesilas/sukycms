<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AnimalLocationFilters;
use App\Models\AnimalLocation;
use App\Support\Crud\Crud;
use App\Support\Crud\DontDestroyLast;
use App\Support\Crud\Fields\Text;
use App\Support\Orderable;
use Illuminate\Support\Collection;

class AnimalLocationController extends AdminBaseController
{
    use Crud, Orderable, DontDestroyLast;

    protected string $model = AnimalLocation::class;

    protected string $namespace = 'animals.locations';

    public function indexQuery(): Collection
    {
        return AnimalLocation::withCount('animals')
            ->filter(app(AnimalLocationFilters::class))
            ->orderBy('order')
            ->get();
    }

    public function fields(): array
    {
        return [
            (new Text)->make('location'),
            (new Text)->align('right')->make('animals_count'),
            (new Text)->align('center')->make('order'),
            (new Text)->align('right')->make('actions'),
        ];
    }
}
