@extends('admin.layouts.base')

@section('content')

    @component('admin.components.table', [
        'items' => $users
    ])
        @slot('title')
            {{ __('users.list') }}
        @endslot

        @slot('thead')
            <tr>
                <th>{{ __('forms.name') }}</th>
                <th>{{ __('forms.email') }}</th>
                <th class="text-right">{{ __('forms.last_login') }}</th>
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
                    <td class="text-right">{{ $user->created_at->diffForHumans() }}</td>
                    <td class="actions">
                        <ul>
                            <li><a href="#"><i class="fas fa-trash-alt fa-fw"></i></a></li>
                            <li><a href="#"><i class="fas fa-edit fa-fw"></i></a></li>
                            <li><a href="#"><i class="fas fa-eye fa-fw"></i></a></li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection
