<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Filters\PageFilters;
use App\Models\Page;
use App\Support\Crud\Crud;
use App\Support\Crud\Fields\Text;
use Illuminate\Pagination\LengthAwarePaginator;

class PageController extends PanelController
{
    use Crud;

    protected string $model = Page::class;

    protected string $namespace = 'pages';

    public function indexQuery(): LengthAwarePaginator
    {
        return Page::query()->filter(app(PageFilters::class))->paginate();
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
