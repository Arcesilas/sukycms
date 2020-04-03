<?php

namespace App\Support;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Attachmentable
{
    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }
}
