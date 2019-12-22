@extends('admin.layouts.base')

@section('content')

    @component('admin.components.table', [
        'items' => $locations
    ])
        @slot('title')
            {{ __('animals.configuration.locations.list') }}
        @endslot

        @slot('actions')
            <a href="" class="btn btn-blue">
                <i class="fas fa-plus-circle fa-fw mr-2"></i> Nuevo
            </a>
        @endslot

        @slot('thead')
            <tr>
                <th>{{ __('forms.name') }}</th>
                <th class="text-right">Nº de animales</th>
                <th></th>
            </tr>
        @endslot

        @slot('tbody')
            @foreach ($locations as $location)
                <tr>
                    <td>{{ $location->location }}</td>
                    <td class="text-right">{{ $location->animals_count }}</td>
                    <td class="actions visible">
                        <ul>
                            <li>
                                <a href="{{ route('admin.users.edit', $location) }}" class="text-blue-500" data-tooltip="Editar">
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
