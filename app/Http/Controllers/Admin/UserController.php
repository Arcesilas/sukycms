<?php

namespace App\Http\Controllers\Admin;

use App\Filters\UserFilters;
use App\Forms\Admin\UserForm;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Notifications\Admin\UserRegistered;
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
            // TODO: resize & refactor
            $user->avatar = asset('storage/' . $request
                    ->file('avatar')
                    ->store('images/avatar', 'public'));
        }

        $user->save();

        if ($request->get('notify')) {
            $user->notify(new UserRegistered($request->get('password')));
        }

        flash(
            __('users.notification.registered.title'),
            __('users.notification.registered.text'),
        )->show();

        return redirect()->route('admin.users.index');
    }

    public function edit(UserForm $form, User $user): View
    {
        return view('admin.users.edit', [
            'form' => $form->setData($user)->make(),
            'user' => $user,
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->name = $request->get('name');

        if ($request->filled('password')) {
            $user->password = $request->get('password');
        }

        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->status = $request->get('status');

        if ($request->hasFile('avatar')) {
            // TODO: resize & refactor
            $user->avatar = asset('storage/' . $request
                    ->file('avatar')
                    ->store('images/avatar', 'public'));
        }

        $user->save();

        flash(__('forms.saved'),)->show();

        return redirect()->route('admin.users.edit', $user);
    }

    public function configuration(): View
    {
        return view('admin.users.configuration');
    }
}
