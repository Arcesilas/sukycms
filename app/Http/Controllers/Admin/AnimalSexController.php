<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalSex;
use App\Support\Crud\Crud;
use App\Support\Crud\Fields\Text;
use Illuminate\Support\Collection;

class AnimalSexController extends AdminBaseController
{
    use Crud;

    protected string $model = AnimalSex::class;

    protected string $namespace = 'animals.sexes';

    public function indexQuery(): Collection
    {
        return AnimalSex::withCount('animals')->get();
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
