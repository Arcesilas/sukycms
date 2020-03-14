<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AnimalStatusFilters;
use App\Models\AnimalStatus;
use App\Support\Crud\Crud;
use App\Support\Crud\DontDestroyLast;
use App\Support\Crud\Fields\Text;
use App\Support\Orderable;
use Illuminate\Support\Collection;

class AnimalStatusController extends AdminBaseController
{
    use Crud, Orderable, DontDestroyLast;

    protected string $model = AnimalStatus::class;

    protected string $namespace = 'animals.statuses';

    public function indexQuery(): Collection
    {
        return AnimalStatus::withCount('animals')
            ->filter(app(AnimalStatusFilters::class))
            ->orderBy('order')
            ->get();
    }

    public function fields(): array
    {
        return [
            (new Text)->make('status'),
            (new Text)->align('right')->make('animals_count'),
            (new Text)->align('center')->make('order'),
            (new Text)->align('right')->make('actions'),
        ];
    }
}
