<?php

namespace App\Models;

use App\Scopes\Animals\SexScope;
use App\Scopes\Animals\SpeciesScope;
use App\Scopes\Animals\LocationScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    public static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new SexScope());
        static::addGlobalScope(new LocationScope());
        static::addGlobalScope(new SpeciesScope());
    }

    public function sex(): BelongsTo
    {
        return $this->belongsTo(AnimalSex::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(AnimalLocation::class);
    }

    public function kind(): BelongsTo
    {
        return $this->belongsTo(AnimalSpecies::class);
    }
}
