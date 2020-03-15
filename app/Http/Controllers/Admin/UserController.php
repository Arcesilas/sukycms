<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Support\Crud\Crud;
use App\Filters\UserFilters;
use App\Support\Crud\Fields\Text;
use App\Support\Crud\Fields\Custom;

class UserController extends AdminBaseController
{
    use Crud;

    protected string $model = User::class;

    protected string $namespace = 'users';

    public function indexQuery(): LengthAwarePaginator
    {
        return User::query()->filter(app(UserFilters::class))->paginate();
    }

    public function fields(): array
    {
        return [
            (new Custom)->make('name'),
            (new Text)->make('email'),
            (new Text)->align('right')->make('actions'),
        ];
    }
}
