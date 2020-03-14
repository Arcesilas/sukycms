@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    <h4 class="text-xl mb-4">{{ __($transNamespace.'.edit.title', ['name' => (string) $model]) }}</h4>

    <div class="card">
        <div class="card-body">
            @include($viewNamespace.'.form')
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
