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
                    <td class="text-center">{{ optional($user->last_login)->diffForHumans() ?? '-' }}</td>
                    <td class="actions">
                        <ul>
                            <li>
                                <a href="#" class="text-purple-500" data-tooltip="Ver">
                                    <i class="fas fa-eye fa-fw"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-500" data-tooltip="Editar">
                                    <i class="fas fa-edit fa-fw"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-red-500" data-tooltip="Eliminar">
                                    <i class="fas fa-trash-alt fa-fw"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection
