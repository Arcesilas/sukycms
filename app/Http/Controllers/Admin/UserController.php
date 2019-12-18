<?php

namespace App\Http\Controllers\Admin;

use App\Filters\UserFilters;
use App\Models\User;
use Illuminate\View\View;

class UserController extends AdminBaseController
{
    public function index(UserFilters $filter): View
    {
        $users = User::query()->filter($filter);

        return view('admin.users.index', [
            'users' => $users->paginate(),
        ]);
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function configuration(): View
    {
        return view('admin.users.configuration');
    }
}
