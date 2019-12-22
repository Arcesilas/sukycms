<?php

namespace App\Scopes\Animals;

use App\Models\AnimalSpecies;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SpeciesScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->addSelect([
            'gender' => AnimalSpecies::select('kind')
                ->whereColumn('kind_id', 'animal_kinds.id'),
        ]);
    }
}
