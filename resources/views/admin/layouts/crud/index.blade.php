@extends('admin.layouts.base')

@section('content')

    @component('admin.components.table', [
        'items' => $items
    ])
        @slot('title')
            {{ __($transNamespace.'.list') }}
        @endslot

        @slot('actions')
            <a href="{{ route($routeNamespace.'.create') }}" class="btn btn-blue">
                <i class="fas fa-plus-circle fa-fw mr-2"></i> Nuevo
            </a>
        @endslot

        @slot('thead')
            <tr>
                @foreach ($tableFields as $key => $field)
                    <th class="text-{{ $field['align'] ?? '' }}">{{ $field['title'] ?? __('forms.'.$key) }}</th>
                @endforeach
            </tr>
        @endslot

        @slot('tbody')
            @foreach ($items as $item)
                <tr>
                    @foreach ($tableFields as $key => $field)
                        @if ($key === 'actions')
                            @include('admin.layouts.crud.fields.actions')
                            @continue
                        @endif

                        @if (view()->exists('admin.layouts.crud.fields.'.$key))
                            @include('admin.layouts.crud.fields.'.$key)
                            @continue
                        @endif

                        <td class="text-{{ $field['align'] ?? '' }}">{{ $item->$key }}</td>
                    @endforeach
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection
