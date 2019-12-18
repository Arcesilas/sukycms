<?php

namespace App\Scopes\Animals;

use App\Models\AnimalGender;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class GenderScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->addSelect([
            'gender' => AnimalGender::select('gender')
                ->whereColumn('gender_id', 'animal_genders.id'),
        ]);
    }
}
