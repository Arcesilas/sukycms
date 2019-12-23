<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AnimalFilters;
use App\Forms\Admin\AnimalForm;
use App\Models\Animal;
use Illuminate\View\View;

class AnimalController extends AdminBaseController
{
    public function index(AnimalFilters $filter): View
    {
        $animals = Animal::filter($filter);

        return view('admin.animals.index', [
            'animals' => $animals->paginate(),
        ]);
    }

    public function create(AnimalForm $form): View
    {
        return view('admin.animals.create', [
            'form' => $form->make(),
        ]);
    }
}
