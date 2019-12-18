<?php

namespace App\Models;

use App\Scopes\Animals\GenderScope;
use App\Scopes\Animals\KindScope;
use App\Scopes\Animals\LocationScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    public static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new GenderScope());
        static::addGlobalScope(new LocationScope());
        static::addGlobalScope(new KindScope());
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(AnimalGender::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(AnimalLocation::class);
    }

    public function kind(): BelongsTo
    {
        return $this->belongsTo(AnimalKind::class);
    }
}
