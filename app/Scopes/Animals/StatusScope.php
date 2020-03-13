<?php

namespace App\Scopes\Animals;

use App\Models\AnimalLocation;
use App\Models\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StatusScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        // TODO: FIX
        $builder->addSelect([
            'status' => Status::inRandomOrder()->select('status')->take(1),
        ]);
    }
}
