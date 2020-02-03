@extends('admin.layouts.base')

@section('content')

    @component('admin.components.table', [
        'items' => $behaviors
    ])
        @slot('title')
            {{ __('animals.configuration.behaviors.list') }}
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
                <th class="text-center">Orden</th>
                <th></th>
            </tr>
        @endslot

        @slot('tbody')
            @foreach ($behaviors as $behavior)
                <tr>
                    <td>{{ $behavior->behavior }}</td>
                    <td class="text-right">{{ $behavior->animals_count }}</td>
                    <td class="text-center">
                        @if ($behavior->order !== 1)
                            <a href="" class="text-green-500" data-tooltip="Editar">
                                <i class="fas fa-arrow-up fa-fw"></i>
                            </a>
                        @endif
                        {{ $behavior->order }}
                        @if ($behavior->order !== count($behaviors))
                            <a href="" class="text-green-500" data-tooltip="Editar">
                                <i class="fas fa-arrow-down fa-fw"></i>
                            </a>
                        @endif
                    </td>
                    <td class="actions visible">
                        <ul>
                            <li>
                                <a href="{{ route('admin.users.edit', $behavior) }}" class="text-blue-500" data-tooltip="Editar">
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
