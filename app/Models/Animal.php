<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\AnimalForm;
use App\Scopes\Animals\LocationScope;
use App\Scopes\Animals\MainPhotoScope;
use App\Scopes\Animals\SexScope;
use App\Scopes\Animals\SpeciesScope;
use App\Scopes\Animals\StatusScope;
use App\Support\LogsActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Animal
 *
 * @property int $id
 * @property string|null $identifier
 * @property string $name
 * @property int $species_id
 * @property int $sex_id
 * @property int $location_id
 * @property int $status_id
 * @property \Illuminate\Support\Carbon $birth_date
 * @property \Illuminate\Support\Carbon|null $entry_date
 * @property float|null $weight
 * @property int|null $height
 * @property int|null $length
 * @property string|null $litter
 * @property string|null $breed
 * @property string|null $microchip
 * @property string $description
 * @property string|null $private_description
 * @property int $visits_list
 * @property int $visits
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Behavior[] $behaviors
 * @property-read int|null $behaviors_count
 * @property-read \App\Models\AnimalSpecies $kind
 * @property-read \App\Models\AnimalLocation $location
 * @property-read \App\Models\AnimalSex $sex
 * @property-read \App\Models\AnimalStatus $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal filter(\App\Filters\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereBreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereEntryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereLitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereMicrochip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal wherePrivateDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereSexId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereSpeciesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereVisits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereVisitsList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Animal whereWeight($value)
 * @mixin \Eloquent
 */
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
        static::addGlobalScope(new StatusScope());
        static::addGlobalScope(new MainPhotoScope());

        static::addGlobalScope(function (Builder $builder) {
            return $builder->orderBy('name');
        });
    }

    protected $casts = [
        'birth_date' => 'date',
        'entry_date' => 'date',
    ];

    public function getPhoto(): string
    {
        if ($this->main_photo) {
            return Storage::disk('uploads')->url($this->main_photo);
        }

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

    public function hasMainPhoto(): bool
    {
        return (bool) $this->photos->first(function ($photo) {
            return $photo->main;
        });
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

    public function photos(): HasMany
    {
        return $this->hasMany(AnimalPhoto::class);
    }

    public function behaviors(): BelongsToMany
    {
        return $this->belongsToMany(Behavior::class, 'animal_behavior');
    }

    public function health(): HasMany
    {
        return $this->hasMany(AnimalHealth::class);
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
