<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Scopes\Animals\SexScope;
use App\Scopes\Animals\SpeciesScope;
use App\Scopes\Animals\LocationScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Animal extends Model
{
    use Filterable;

    public static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new SexScope());
        static::addGlobalScope(new LocationScope());
        static::addGlobalScope(new SpeciesScope());
    }

    protected $casts = [
        'birth_date' => 'datetime',
    ];

    public function getPhoto(): string
    {
        return 'https://picsum.photos/200?random='.$this->id;
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

    public function behaviors(): BelongsToMany
    {
        return $this->belongsToMany(Behavior::class, 'animal_behavior');
    }
}
