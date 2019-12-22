<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalLocation;
use App\Models\AnimalSex;

class AnimalController extends AdminBaseController
{
    public function configuration()
    {
        return view('admin.animals.configuration.index');
    }

    public function sexes()
    {
        return view('admin.animals.configuration.sexes', [
            'sexes' => AnimalSex::withCount('animals')->get(),
        ]);
    }

    public function locations()
    {
        return view('admin.animals.configuration.locations', [
            'locations' => AnimalLocation::withCount('animals')->get(),
        ]);
    }
}
