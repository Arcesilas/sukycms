<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\AnimalSpeciesForm;
use App\Support\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\AnimalSpecies
 *
 * @property int $id
 * @property string $species
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Animal[] $animals
 * @property-read int|null $animals_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSpecies filter(\App\Filters\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSpecies newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSpecies newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSpecies query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSpecies whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSpecies whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSpecies whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSpecies whereSpecies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSpecies whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
