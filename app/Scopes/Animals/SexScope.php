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
            'sex' => AnimalSex::select('sex')
                ->whereColumn('sex_id', 'animal_sexes.id'),
        ]);
    }
}
