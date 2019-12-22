@extends('admin.layouts.base')

@section('content')

    @component('admin.components.table', [
        'items' => $animals
    ])
        @slot('title')
            {{ __('animals.list') }}
        @endslot

        @slot('thead')
            <tr>
                <th>{{ __('forms.name') }}</th>
                <th>{{ __('forms.species') }}</th>
                <th>{{ __('forms.sex') }}</th>
                <th>{{ __('forms.status') }}</th>
                <th></th>
            </tr>
        @endslot

        @slot('tbody')
            @foreach ($animals as $animal)
                <tr>
                    <td>
                        <img src="{{ $animal->getPhoto() }}" alt="" class="avatar">
                        {{ $animal->name }}<br>
                        <span>{{ $animal->birth_date->shortAbsoluteDiffForHumans() }}</span>
                    </td>
                    <td>{{ $animal->species }}</td>
                    <td>{{ $animal->sex }}</td>
                    <td>{{ $animal->status }}</td>
                    <td class="actions">
                        <ul>
                            <li>
                                <a href="#" class="text-purple-500" data-tooltip="Ver">
                                    <i class="fas fa-eye fa-fw"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.animals.edit', $animal) }}" class="text-blue-500" data-tooltip="Editar">
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
