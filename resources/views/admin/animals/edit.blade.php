@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    @include('admin.animals.animal_header')

    <div class="card">
        <div class="card-body">
            @include($viewNamespace.'.form')
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
