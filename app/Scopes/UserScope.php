<?php

namespace App\Scopes;

use App\Models\AnimalSex;
use App\Models\User;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class UserScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->addSelect([
            'user' => User::select('name')
                ->whereColumn('user_id', 'users.id'),
        ]);
    }
}
