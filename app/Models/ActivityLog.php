<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Arr;

class ActivityLog extends Model
{
    protected $table = 'activity_log';

    protected $casts = [
        'before' => 'collection',
        'after' => 'collection',
    ];

    protected $ignoreAttributes = [
        'password',
        'token',
        'created_at',
        'updated_at',
    ];

    public function by(User $user): self
    {
        $this->user()->associate($user);

        return $this;
    }

    public function onModel(Model $model): ?self
    {
        $this->model()->associate($model);

        $this->description = $model->wasRecentlyCreated ? 'created' : 'updated';

        if (! $model->wasRecentlyCreated) {
            if  (empty($model->getChanges())) {
                $this->description = null;
                return $this;
            }

            $this->before = $this->parseAttributes($model->oldAttributes);
            $this->after = $this->parseAttributes($model->getChanges());
        } else {
            $this->after = $this->parseAttributes($model->getAttributes());
        }

        return $this;
    }

    public function log(?string $description = null): self
    {
        if (! $this->user && auth()->check()) {
            $this->user()->associate(auth()->user());
        }

        $this->description ?: $description;

        if (! $this->description && ! $this->after) {
            return $this;
        }

        $this->save();

        return $this;
    }

    private function parseAttributes(array $attributes): array
    {
        return Arr::except($attributes, $this->ignoreAttributes);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
