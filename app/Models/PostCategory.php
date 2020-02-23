<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use Filterable;

    public $table = 'posts_categories';
}
