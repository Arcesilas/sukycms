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
                    <td class="text-center">
                        <button class="btn btn-blue-outline" data-micromodal-trigger="modal-{{ $loop->index }}"><i class="fas fa-eye"></i></button>

                        <div class="modal" id="modal-{{ $loop->index }}" aria-hidden="true">
                            <div class="modal-overlay" tabindex="-1" data-micromodal-close>
                                <div class="card relative" role="dialog" aria-modal="true" aria-labelledby="modal-{{ $loop->index }}-title" >
                                    <div class="card-body" id="modal-{{ $loop->index }}-content">
                                        <div class="flex">
                                            <div class="w-1/2">
                                                <p class="text-xl uppercase mb-6">Antes</p>
                                                @if ($log->before)
                                                    @foreach ($log->before as $key => $value)
                                                        <p class="mb-4 truncate">{{ __("forms.{$key}") }}:<br>{{ $value }}</p>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="w-1/2">
                                                <p class="text-xl uppercase mb-6">Después</p>
                                                @if ($log->after)
                                                    @foreach ($log->after as $key => $value)
                                                        <p class="mb-4 truncate">{{ __("forms.{$key}") }}:<br>{{ $value }}</p>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        <div class="w-full">
                                            <p class="text-right">Realizado por {{ $log->user->name }} {{ $log->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection
