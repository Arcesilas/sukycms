<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Filters\AnimalSexFilters;
use App\Models\AnimalSex;
use App\Support\Crud\Crud;
use App\Support\Crud\Fields\Text;
use App\Support\Orderable;
use Illuminate\Support\Collection;

class AnimalSexController extends PanelController
{
    use Crud, Orderable;

    protected string $model = AnimalSex::class;

    protected string $namespace = 'animals.sexes';

    public function indexQuery(): Collection
    {
        return AnimalSex::withCount('animals')
            ->filter(app(AnimalSexFilters::class))
            ->orderBy('order')
            ->get();
    }

    public function fields(): array
    {
        return [
            (new Text)->make('sex'),
            (new Text)->align('right')->make('animals_count'),
            (new Text)->align('center')->make('order'),
            (new Text)->align('right')->make('actions'),
        ];
    }
}
