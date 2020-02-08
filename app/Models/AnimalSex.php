<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnimalSex extends Model
{
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
}
