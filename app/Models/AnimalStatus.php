<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\AnimalStatusForm;
use App\Support\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\AnimalStatus
 *
 * @property int $id
 * @property string $status
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Animal[] $animals
 * @property-read int|null $animals_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalStatus filter(\App\Filters\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalStatus whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalStatus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AnimalStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AnimalStatus extends Model
{
    use Filterable, LogsActivity;

    public string $form = AnimalStatusForm::class;

    public static function boot(): void
    {
        self::saving(static function (AnimalStatus $status) {
            if (! $status->order) {
                $status->order = self::orderBy('order', 'DESC')->first()->order + 1;
            }
        });

        parent::boot();
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class, 'status_id');
    }

    public function __toString(): string
    {
        return $this->status;
    }
}
