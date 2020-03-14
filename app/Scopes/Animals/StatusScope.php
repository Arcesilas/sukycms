<?php

namespace App\Scopes\Animals;

use App\Models\AnimalStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StatusScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->addSelect([
            'status' => AnimalStatus::select('status')
                ->whereColumn('status_id', 'animal_statuses.id'),
        ]);
    }
}
