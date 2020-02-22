<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\AnimalSexForm;
use App\Support\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
