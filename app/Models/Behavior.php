<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\BehaviorForm;
use App\Support\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Behavior
 *
 * @property int $id
 * @property string $behavior
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Animal[] $animals
 * @property-read int|null $animals_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Behavior filter(\App\Filters\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Behavior newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Behavior newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Behavior query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Behavior whereBehavior($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Behavior whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Behavior whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Behavior whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Behavior whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Behavior extends Model
{
    use Filterable, LogsActivity;

    public string $form = BehaviorForm::class;

    public static function boot(): void
    {
        self::saving(static function (Behavior $behavior) {
            if (! $behavior->order) {
                $behavior->order = self::orderBy('order', 'DESC')->first()->order + 1;
            }
        });

        parent::boot();
    }

    public function animals(): BelongsToMany
    {
        return $this->belongsToMany(Animal::class);
    }

    public function __toString(): string
    {
        return $this->behavior;
    }
}
