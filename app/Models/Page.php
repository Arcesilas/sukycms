<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\PageForm;
use App\Scopes\UserScope;

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

        static::addGlobalScope(new UserScope());
    }

    public function __toString()
    {
        return $this->title;
    }
}
