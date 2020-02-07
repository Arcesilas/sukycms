<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\AnimalSexForm;
use App\Http\Requests\AnimalSexRequest;
use App\Models\AnimalSex;
use App\Support\Crud;
use App\Support\Forms\Form;
use Illuminate\Support\Collection;

class AnimalSexController extends AdminBaseController
{
    use Crud;

    protected string $viewNamespace = 'admin.animals.sexes';

    protected string $transNamespace = 'animals.sexes';

    protected string $routeNamespace = 'admin.animals.sexes';

    public function indexQuery(): Collection
    {
        return AnimalSex::withCount('animals')->get();
    }

    public function form(): Form
    {
        return new AnimalSexForm();
    }

    public function formRequest(): string
    {
        return AnimalSexRequest::class;
    }

    public function tableFields(): array
    {
        return [
            'sex' => [],
            'animals_count' => [
                'align' => 'right',
            ],
            'order' => [
                'align' => 'center',
            ],
            'actions' => [
                'align' => 'right',
            ],
        ];
    }
}
