<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Filters\AnimalFilters;
use App\Models\Animal;
use App\Models\Behavior;
use App\Support\Crud\Crud;
use App\Support\Crud\Fields\Custom;
use App\Support\Crud\Fields\Text;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class AnimalController extends PanelController
{
    use Crud;

    protected string $model = Animal::class;

    protected string $namespace = 'animals';

    public function indexQuery(): LengthAwarePaginator
    {
        return Animal::query()->filter(app(AnimalFilters::class))->paginate();
    }

    public function formViewShare(): array
    {
        return [
            'behaviors' => Behavior::orderBy('order')->get(['id', 'behavior']),
        ];
    }

    public function fields(): array
    {
        return [
            (new Custom)->make('name'),
            (new Text)->make('species'),
            (new Text)->make('sex'),
            (new Text)->align('right')->make('actions'),
        ];
    }

    public function configuration(): View
    {
        return view('admin.animals.configuration.index');
    }
}
