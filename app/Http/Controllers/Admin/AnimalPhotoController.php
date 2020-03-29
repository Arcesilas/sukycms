<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AnimalHealthFilters;
use App\Models\Animal;
use App\Models\AnimalHealth;
use App\Models\AnimalPhoto;
use App\Support\Crud\CrudChild;
use App\Support\Crud\DontDestroyLast;
use App\Support\Crud\Fields\Text;
use App\Support\Orderable;
use Illuminate\Pagination\LengthAwarePaginator;

class AnimalPhotoController extends AdminBaseController
{
    public function index(Animal $animal)
    {
        return view('admin.animals.photos.index', [
            'model' => $animal,
        ]);
    }
}
