<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use App\Support\Crud\Crud;
use App\Filters\UserFilters;
use App\Support\Crud\Fields\Text;
use Illuminate\Support\Collection;
use App\Support\Crud\Fields\Custom;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends AdminBaseController
{
    use Crud;

    protected string $model = User::class;

    protected string $namespace = 'users';

    public function indexQuery(): LengthAwarePaginator
    {
        $filter = app(UserFilters::class);

        return User::query()->filter($filter)->paginate();
    }

    public function fields(): array
    {
        return [
            (new Custom)->make('name'),
            (new Text)->make('email'),
            (new Text)->align('right')->make('actions'),
        ];
    }

    public function configuration(): View
    {
        return view('admin.users.configuration');
    }
}
