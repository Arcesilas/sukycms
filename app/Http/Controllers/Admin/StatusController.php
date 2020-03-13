<?php

namespace App\Http\Controllers\Admin;

use App\Filters\StatusFilters;
use App\Models\Status;
use App\Support\Crud\Crud;
use App\Support\Crud\DontDestroyLast;
use App\Support\Crud\Fields\Text;
use App\Support\Orderable;
use Illuminate\Support\Collection;

class StatusController extends AdminBaseController
{
    use Crud, Orderable, DontDestroyLast;

    protected string $model = Status::class;

    protected string $namespace = 'animals.statuses';

    public function indexQuery(): Collection
    {
        return Status::withCount('animals')
            ->filter(app(StatusFilters::class))
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
