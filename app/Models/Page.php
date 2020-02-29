<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\PageForm;
use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Filterable;

    public string $form = PageForm::class;

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
