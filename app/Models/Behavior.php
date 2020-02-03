<?php

namespace App\Models;

use App\Support\Orderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Behavior extends Model
{
    use Orderable;

    public function animals(): BelongsToMany
    {
        return $this->belongsToMany(Animal::class);
    }
}
