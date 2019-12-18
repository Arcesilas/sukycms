<?php

namespace App\Filters;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $query, Filter $filters): Builder
    {
        return $filters->apply($query);
    }
}
