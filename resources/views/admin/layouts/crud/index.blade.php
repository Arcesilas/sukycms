@extends('admin.layouts.base')

@section('content')

    @if (view()->exists($viewNamespace.'.index_header'))
        @include($viewNamespace.'.index_header')
    @else
        <h4 class="text-xl mb-4">{{ __($transNamespace.'.list') }}</h4>
        @if (is_iterable(__($transNamespace.'.description')))
            <div class="text-gray-600">
                @foreach (__($transNamespace.'.description') ?? [] as $description)
                    <p class="w-2/3 {{ ! $loop->last ? 'mb-4' : '' }}">{!! $description !!}</p>
                @endforeach
            </div>
        @endif

        <hr class="my-8">
    @endif

    @component('admin.components.table', [
        'items' => $items,
        'searchForm' => true,
    ])
        @slot('title')

        @endslot

        @slot('actions')
            @if (isset($parent))
                <a href="{{ route($routeNamespace.'.create', $parent) }}" class="btn btn-blue">
                    <i class="fas fa-plus-circle fa-fw mr-2"></i> Nuevo
                </a>
            @else
                <a href="{{ route($routeNamespace.'.create') }}" class="btn btn-blue">
                    <i class="fas fa-plus-circle fa-fw mr-2"></i> Nuevo
                </a>
            @endif
        @endslot

        @slot('thead')
            <tr>
                @foreach ($fields as $field)
                    <th class="text-{{ $field->align ?? '' }}">{{ $field->title ?? __('forms.'.$field->key) }}</th>
                @endforeach
            </tr>
        @endslot

        @slot('tbody')
            @foreach ($items as $item)
                <tr>
                    @foreach ($fields as $field)
                        @if (view()->exists("$viewNamespace.fields.$field->key"))
                            @include("$viewNamespace.fields.$field->key")
                            @continue
                        @endif

                        @if ($field->key === 'actions')
                            @include('admin.layouts.crud.fields.actions')
                            @continue
                        @endif

                        @if ($field instanceof \App\Support\Crud\Fields\Custom)
                            @include($routeNamespace.'.fields.'.$field->view)
                            @continue
                        @endif

                        @if (view()->exists('admin.layouts.crud.fields.'.$field->key))
                            @include('admin.layouts.crud.fields.'.$field->key)
                            @continue
                        @endif

                        <td class="text-{{ $field->align ?? '' }}">{{ Str::limit($item->{$field->key}, 30) }}</td>
                    @endforeach
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection

@push('scripts')
    <script>
        SukyCMS.selectOtherAndDestroy = {
            options: {
                @foreach($items as $item)
                    {{ $item->id }}: '{{ $item->location }}',
                @endforeach
            }
        }
    </script>
@endpush
