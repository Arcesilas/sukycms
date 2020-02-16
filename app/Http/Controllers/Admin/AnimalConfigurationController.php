<?php

namespace App\Http\Controllers\Admin;

use App\Models\AnimalLocation;
use App\Models\AnimalSex;
use App\Models\AnimalSpecies;
use App\Models\Behavior;
use Illuminate\View\View;

class AnimalConfigurationController extends AdminBaseController
{
    public function configuration(): View
    {
        return view('admin.animals.configuration.index');
    }
}
