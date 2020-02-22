<?php

namespace App\Models;

use App\Forms\Admin\AnimalLocationForm;
use App\Support\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnimalLocation extends Model
{
    use LogsActivity;

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
