<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\AnimalSexForm;
use App\Support\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\AnimalSex
 *
 * @property int $id
 * @property string $sex
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Animal[] $animals
 * @property-read int|null $animals_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSex filter(\App\Filters\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSex newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSex newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSex query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSex whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSex whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSex whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSex whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalSex whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AnimalSex extends Model
{
    use Filterable, LogsActivity;

    public string $form = AnimalSexForm::class;

    public static function boot(): void
    {
        self::saving(static function (AnimalSex $sex) {
            if (! $sex->order) {
                $sex->order = self::orderBy('order', 'DESC')->first()->order + 1;
            }
        });

        parent::boot();
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class, 'sex_id');
    }

    public function __toString(): string
    {
        return $this->sex;
    }
}
