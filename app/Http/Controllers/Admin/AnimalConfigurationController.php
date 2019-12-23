<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalLocation;
use App\Models\AnimalSex;
use App\Models\AnimalSpecies;
use Illuminate\View\View;

class AnimalConfigurationController extends AdminBaseController
{
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
