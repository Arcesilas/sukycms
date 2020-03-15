<?php

namespace App\Http\Controllers\Admin;

use App\Filters\PostFilters;
use App\Models\Post;
use App\Support\Crud\Crud;
use App\Support\Crud\Fields\Text;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends AdminBaseController
{
    use Crud;

    protected string $model = Post::class;

    protected string $namespace = 'posts';

    public function indexQuery(): LengthAwarePaginator
    {
        return Post::query()->filter(app(PostFilters::class))->paginate();
    }

    public function fields(): array
    {
        return [
            (new Text)->make('title'),
            (new Text)->make('user'),
            (new Text)->make('published_at'),
            (new Text)->align('right')->make('actions'),
        ];
    }
}
