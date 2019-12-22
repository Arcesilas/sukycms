<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AnimalFilters;
use App\Models\Animal;
use App\Models\AnimalLocation;
use App\Models\AnimalSex;
use App\Models\AnimalSpecies;
use Illuminate\View\View;

class AnimalController extends AdminBaseController
{
    public function index(AnimalFilters $filter)
    {
        $animals = Animal::query()->filter($filter);

        return view('admin.animals.index', [
            'animals' => $animals->paginate(),
        ]);
    }

    public function configuration(): View
    {
        return view('admin.animals.configuration.index');
    }

    public function sexes(): View
    {
        return view('admin.animals.configuration.sexes', [
            'sexes' => AnimalSex::withCount('animals')->get(),
        ]);
    }

    public function locations(): View
    {
        return view('admin.animals.configuration.locations', [
            'locations' => AnimalLocation::withCount('animals')->get(),
        ]);
    }

    public function species(): View
    {
        return view('admin.animals.configuration.species', [
            'species' => AnimalSpecies::withCount('animals')->get(),
        ]);
    }
}
