<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AnimalHealthFilters;
use App\Models\AnimalHealth;
use App\Support\Crud\CrudChild;
use App\Support\Crud\DontDestroyLast;
use App\Support\Crud\Fields\Text;
use App\Support\Orderable;
use Illuminate\Pagination\LengthAwarePaginator;

class AnimalHealthController extends AdminBaseController
{
    use CrudChild, Orderable, DontDestroyLast;

    protected string $model = AnimalHealth::class;

    protected string $namespace = 'animals.health';

    public function indexQuery(): LengthAwarePaginator
    {
        return AnimalHealth::query()->filter(app(AnimalHealthFilters::class))->paginate();
    }

    public function fields(): array
    {
        return [
            (new Text)->make('title'),
            (new Text)->align('right')->make('actions'),
        ];
    }
}
