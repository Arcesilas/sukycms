<?php

namespace App\Models;

use App\Forms\Admin\AnimalLocationForm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnimalLocation extends Model
{
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
}
