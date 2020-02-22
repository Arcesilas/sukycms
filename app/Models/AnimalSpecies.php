<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\AnimalSpeciesForm;
use App\Support\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnimalSpecies extends Model
{
    use Filterable, LogsActivity;

    public string $form = AnimalSpeciesForm::class;

    public static function boot(): void
    {
        self::saving(static function (AnimalSpecies $species) {
            if (! $species->order) {
                $species->order = self::orderBy('order', 'DESC')->first()->order + 1;
            }
        });

        parent::boot();
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class, 'species_id');
    }

    public function __toString(): string
    {
        return $this->species;
    }
}
