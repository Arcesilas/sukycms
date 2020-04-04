<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AnimalPhoto extends Model
{
    protected $casts = [
        'main' => 'bool',
    ];

    public function getUrl(): string
    {
        return Storage::disk('uploads')->url($this->photo);
    }

    public function getThumbnailUrl(): string
    {
        return Storage::disk('uploads')->url($this->thumbnail);
    }
}
