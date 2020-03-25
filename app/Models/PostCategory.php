<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PostCategory
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostCategory filter(\App\Filters\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PostCategory extends Model
{
    use Filterable;

    public $table = 'posts_categories';
}
