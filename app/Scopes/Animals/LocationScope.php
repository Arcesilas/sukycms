<?php

namespace App\Scopes\Animals;

use App\Models\AnimalLocation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class LocationScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->addSelect([
            'location' => AnimalLocation::select('location')
                ->whereColumn('location_id', 'animal_locations.id'),
        ]);
    }
}
