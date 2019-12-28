<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Behavior extends Model
{
    public function animals(): BelongsToMany
    {
        return $this->belongsToMany(Animal::class);
    }
}
