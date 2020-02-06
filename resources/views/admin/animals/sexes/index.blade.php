@extends('admin.layouts.base')

@section('content')

    @component('admin.components.table', [
        'items' => $sexes
    ])
        @slot('title')
            {{ __('animals.configuration.sexes.list') }}
        @endslot

        @slot('actions')
            <a href="{{ route('admin.animals.sexes.create') }}" class="btn btn-blue">
                <i class="fas fa-plus-circle fa-fw mr-2"></i> Nuevo
            </a>
        @endslot

        @slot('thead')
            <tr>
                <th>Sexo</th>
                <th class="text-right">Nº de animales</th>
                <th class="text-center">Orden</th>
                <th></th>
            </tr>
        @endslot

        @slot('tbody')
            @foreach ($sexes as $sex)
                <tr>
                    <td>{{ $sex->sex }}</td>
                    <td class="text-right">{{ $sex->animals_count }}</td>
                    <td class="text-center">
                        @if (! $loop->first)
                            <a href="" class="text-green-500" data-tooltip="Subir">
                                <i class="fas fa-arrow-up fa-fw"></i>
                            </a>
                        @endif
                        {{ $sex->order }}
                        @if (! $loop->last)
                            <a href="" class="text-green-500" data-tooltip="Bajar">
                                <i class="fas fa-arrow-down fa-fw"></i>
                            </a>
                        @endif
                    </td>
                    <td class="actions visible">
                        <ul>
                            <li>
                                <a href="{{ route('admin.animals.sexes.edit', $sex) }}" class="text-blue-500" data-tooltip="Editar">
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
