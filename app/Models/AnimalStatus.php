<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\AnimalStatusForm;
use App\Support\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
