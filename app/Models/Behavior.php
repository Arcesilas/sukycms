<?php

namespace App\Models;

use App\Forms\Admin\BehaviorForm;
use App\Support\Orderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Behavior extends Model
{
    use Orderable;

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
