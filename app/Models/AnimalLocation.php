<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\AnimalLocationForm;
use App\Support\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\AnimalLocation
 *
 * @property int $id
 * @property string $location
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Animal[] $animals
 * @property-read int|null $animals_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalLocation filter(\App\Filters\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalLocation whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalLocation whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalLocation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AnimalLocation extends Model
{
    use Filterable, LogsActivity;

    public string $form = AnimalLocationForm::class;

    public static function boot(): void
    {
        self::saving(static function (AnimalLocation $sex) {
            if (! $sex->order) {
                $sex->order = self::orderBy('order', 'DESC')->first()->order + 1;
            }
        });

        parent::boot();
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class, 'location_id');
    }

    public function __toString(): string
    {
        return $this->location;
    }
}
