<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\AnimalSexForm;
use App\Http\Requests\AnimalSexRequest;
use App\Models\AnimalSex;
use App\Support\Crud\Crud;
use App\Support\Crud\Fields\Text;
use App\Support\Forms\Form;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class AnimalSexController extends AdminBaseController
{
    use Crud;

    protected string $namespace = 'animals.sexes';

    protected string $model = AnimalSex::class;

    protected string $form = AnimalSexForm::class;

    protected string $formRequest = AnimalSexRequest::class;

    public function indexQuery(): Collection
    {
        return AnimalSex::withCount('animals')->get();
    }

    public function tableFields(): array
    {
        return [
            (new Text)->make('sex'),
            (new Text)->align('right')->make('animals_count'),
            (new Text)->align('center')->make('order'),
            (new Text)->align('right')->make('actions'),
        ];
    }
}
