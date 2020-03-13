<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\StatusForm;
use App\Support\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Status extends Model
{
    use Filterable, LogsActivity;

    public string $form = StatusForm::class;

    public static function boot(): void
    {
        self::saving(static function (Status $status) {
            if (! $status->order) {
                $status->order = self::orderBy('order', 'DESC')->first()->order + 1;
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
        return $this->status;
    }
}
