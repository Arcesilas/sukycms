@extends('admin.layouts.base')

@section('content')

    @if (view()->exists($viewNamespace.'.create_header'))
        @include($viewNamespace.'.create_header')
    @else
        <h4 class="text-xl mb-4">{{ __($transNamespace.'.create.title') }}</h4>
    @endif

    {!! $form->renderStart() !!}

    <div class="card">
        <div class="card-body">
            @include($viewNamespace.'.form')
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
