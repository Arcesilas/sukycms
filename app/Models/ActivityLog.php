<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Arr;

/**
 * App\Models\ActivityLog
 *
 * @property int $id
 * @property int $user_id
 * @property string $model_type
 * @property int $model_id
 * @property string|null $description
 * @property \Illuminate\Support\Collection|null $before
 * @property \Illuminate\Support\Collection|null $after
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog whereAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog whereBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActivityLog whereUserId($value)
 * @mixin \Eloquent
 */
class ActivityLog extends Model
{
    protected $table = 'activity_log';

    protected $casts = [
        'before' => 'collection',
        'after' => 'collection',
    ];

    protected $ignoreAttributes = [
        'id',
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
