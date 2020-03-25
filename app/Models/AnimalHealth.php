<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimalHealth extends BaseModel
{
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
}
