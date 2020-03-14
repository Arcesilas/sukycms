@extends('admin.layouts.base')

@section('content')

    <h4 class="text-xl mb-4">{{ __($transNamespace.'.create.title') }}</h4>

    {!! $form->renderStart() !!}

    <div class="card mt-8">
        <div class="card-body">
            @include($viewNamespace.'.form')
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
