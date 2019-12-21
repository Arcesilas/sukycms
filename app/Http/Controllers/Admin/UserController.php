<?php

namespace App\Http\Controllers\Admin;

use App\Filters\UserFilters;
use App\Forms\Admin\UserForm;
use App\Http\Requests\Admin\UserRequest;
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

    public function create(UserForm $form): View
    {
        return view('admin.users.create', [
            'form' => $form->make(),
        ]);
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->password = $request->get('password');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->status = $request->get('status');

        if ($request->hasFile('avatar')) {
            $user->avatar = asset('storage/'.$request
                ->file('avatar')
                ->store('images/avatar', 'public'));
        }

        $user->save();

        flash(
            __('users.notification.registered.title'),
            __('users.notification.registered.text'),
        )->show();

        return redirect()->route('admin.users.index');
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
