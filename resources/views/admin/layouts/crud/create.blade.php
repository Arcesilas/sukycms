@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    <div class="card">
        <div class="card-title flex flex-row justify-between">
            <h3>{{ __($transNamespace.'.form.create.title') }}</h3>
        </div>
        <div class="card-body">
            <hr class="mt-8 mb-12">

            @include($namespace.'.form')
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
