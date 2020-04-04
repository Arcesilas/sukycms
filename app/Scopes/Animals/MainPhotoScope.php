<?php

namespace App\Scopes\Animals;

use App\Models\AnimalLocation;
use App\Models\AnimalPhoto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class MainPhotoScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->addSelect([
            'main_photo' => AnimalPhoto::select('thumbnail')
                ->whereColumn('animal_id', 'animals.id')
                ->where('main', true),
        ]);
    }
}
