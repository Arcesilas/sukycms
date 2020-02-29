@extends('admin.layouts.base')

@section('content')

    <h4 class="text-xl mb-4">{{ __($transNamespace.'.create.title') }}</h4>
    @if (is_iterable(__($transNamespace.'.create.description')))
        <div class="text-gray-600">
            @foreach (__($transNamespace.'.create.description') ?? [] as $description)
                <p class="w-2/3 {{ ! $loop->last ? 'mb-4' : '' }}">{!! $description !!}</p>
            @endforeach
        </div>
    @endif

    {!! $form->renderStart() !!}

    <div class="card mt-8">
        <div class="card-body">
            <hr class="mt-8 mb-12">

            @include($viewNamespace.'.form')
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
