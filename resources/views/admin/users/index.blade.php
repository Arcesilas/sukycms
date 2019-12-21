@extends('admin.layouts.base')

@section('content')

    @component('admin.components.table', [
        'items' => $users
    ])
        @slot('title')
            Listado de usuarios
        @endslot

        @slot('thead')
            <tr>
                <th>{{ __('forms.name') }}</th>
                <th>{{ __('forms.email') }}</th>
                <th class="text-center">{{ __('forms.last_login') }}</th>
                <th></th>
            </tr>
        @endslot

        @slot('tbody')
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
        @endslot
    @endcomponent

@endsection
