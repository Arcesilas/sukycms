@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    @if (view()->exists($viewNamespace.'.edit_header'))
        @include($viewNamespace.'.edit_header')
    @else
        <h4 class="text-xl mb-4">{{ __($transNamespace.'.edit.title', ['name' => (string) $model]) }}</h4>
    @endif

    <div class="card">
        <div class="card-body">
            @include($viewNamespace.'.form')
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
