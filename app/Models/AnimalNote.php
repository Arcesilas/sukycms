<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\AnimalNoteForm;
use App\Support\Attachmentable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimalNote extends BaseModel
{
    use Filterable, Attachmentable;

    public string $form = AnimalNoteForm::class;

    protected $casts = [
        'date' => 'date',
    ];

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    public function __toString()
    {
        return $this->title;
    }
}
