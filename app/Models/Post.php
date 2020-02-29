<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\PostForm;
use App\Scopes\UserScope;
use Str;

class Post extends BaseModel
{
    use Filterable;

    public string $form = PostForm::class;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function (Post $post) {
            $post->slug = Str::slug($post->title);
            $post->user_id = auth()->user()->id;
        });

        static::addGlobalScope(new UserScope());
    }

    public function __toString()
    {
        return $this->title;
    }
}
