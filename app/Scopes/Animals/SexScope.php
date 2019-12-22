<?php

namespace App\Scopes\Animals;

use App\Models\AnimalSex;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SexScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->addSelect([
            'gender' => AnimalSex::select('gender')
                ->whereColumn('gender_id', 'animal_genders.id'),
        ]);
    }
}
