<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    public function size(): BelongsTo
    {
        return $this->belongsTo(AnimalGender::class);
    }
}
