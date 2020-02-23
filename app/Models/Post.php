<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Filterable;

    public static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new UserScope());
    }
}
