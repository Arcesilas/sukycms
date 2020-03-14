<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\AnimalForm;
use App\Scopes\Animals\LocationScope;
use App\Scopes\Animals\SexScope;
use App\Scopes\Animals\SpeciesScope;
use App\Scopes\Animals\StatusScope;
use App\Support\LogsActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Animal extends BaseModel
{
    use Filterable, LogsActivity;

    public string $form = AnimalForm::class;

    public static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new SexScope());
        static::addGlobalScope(new LocationScope());
        static::addGlobalScope(new SpeciesScope());
        static::addGlobalScope(new StatusScope());
    }

    protected $casts = [
        'birth_date' => 'date',
        'entry_date' => 'date',
    ];

    public function getPhoto(): string
    {
        return 'https://picsum.photos/200?random=' . $this->id;
    }

    public function getAge(): string
    {
        return Carbon::createFromFormat(option('date_format'), $this->birth_date)->shortAbsoluteDiffForHumans();
    }

    public function hasBehavior(int $behavior_id): bool
    {
        return $this->behaviors->contains($behavior_id);
    }

    public function sex(): BelongsTo
    {
        return $this->belongsTo(AnimalSex::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(AnimalLocation::class);
    }

    public function kind(): BelongsTo
    {
        return $this->belongsTo(AnimalSpecies::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(AnimalStatus::class);
    }

    public function behaviors(): BelongsToMany
    {
        return $this->belongsToMany(Behavior::class, 'animal_behavior');
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
