<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\PageForm;
use App\Scopes\UserScope;
use Str;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property \Illuminate\Support\Carbon $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page filter(\App\Filters\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUserId($value)
 * @mixin \Eloquent
 */
class Page extends BaseModel
{
    use Filterable;

    public string $form = PageForm::class;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function (Page $page) {
            $page->slug = Str::slug($page->title);

            if (auth()->check()) {
                $page->user_id = auth()->user()->id;
            }
        });

        static::addGlobalScope(new UserScope());
    }

    public function __toString()
    {
        return $this->title;
    }
}
