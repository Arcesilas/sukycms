<?php

namespace App\Http\Controllers\Admin;

use App\Models\Behavior;
use App\Support\Crud\Crud;
use App\Support\Crud\Fields\Text;
use Illuminate\Support\Collection;

class BehaviorController extends AdminBaseController
{
    use Crud;

    protected string $model = Behavior::class;

    protected string $namespace = 'animals.behaviors';

    public function indexQuery(): Collection
    {
        return Behavior::withCount('animals')->get();
    }

    public function fields(): array
    {
        return [
            (new Text)->make('behavior'),
            (new Text)->align('right')->make('animals_count'),
            (new Text)->align('center')->make('order'),
            (new Text)->align('right')->make('actions'),
        ];
    }
}
