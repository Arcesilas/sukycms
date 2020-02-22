@extends('admin.layouts.base')

@section('content')

    @component('admin.components.table', [
        'items' => $activity_log
    ])
        @slot('title')
            {{ __('animals.list') }}
        @endslot

        @slot('thead')
            <tr>
                <th>{{ __('activity_log.model') }}</th>
                <th>{{ __('activity_log.description') }}</th>
                <th class="text-center">{{ __('activity_log.changes') }}</th>
            </tr>
        @endslot

        @slot('tbody')
            @foreach ($activity_log as $log)
                <tr>
                    <td>{{ $log->model_type }}</td>
                    <td>{{ $log->description }}</td>
                    <td class="text-center"><button class="btn btn-blue-outline"><i class="fas fa-eye"></i></button></td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection
