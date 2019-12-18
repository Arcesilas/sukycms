@extends('admin.layouts.base')

@section('content')

        <div class="card w-full">
            <div class="card-title flex flex-row justify-between">
                <span>Listado de usuarios</span>

                <div class="actions">
                    <form class="search-form">
                        <input type="text" name="q" placeholder="{{ __('forms.search') }}..." class="form-input" value="{{ request('q') }}">
                    </form>
                </div>
            </div>
            <div class="card-body">

                <table class="table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('forms.name') }}</th>
                            <th>{{ __('forms.email') }}</th>
                            <th class="text-center">{{ __('forms.last_login') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ $user->getAvatar() }}" alt="" class="avatar">
                                    {{ $user->name }}<br>
                                    <span>{{ __("users.roles.{$user->role}") }}</span>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">{{ $user->created_at->diffForHumans() }}</td>
                                <td class="actions">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-blue-outline"><i class="fas fa-ellipsis-h"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $users->links() !!}

            </div>
        </div>

@endsection
