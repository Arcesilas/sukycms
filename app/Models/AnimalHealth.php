<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\AnimalHealthForm;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimalHealth extends BaseModel
{
    use Filterable;

    public string $form = AnimalHealthForm::class;

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
}
