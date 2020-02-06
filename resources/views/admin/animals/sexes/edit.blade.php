@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    <div class="card">
        <div class="card-title flex flex-row justify-between">
            <h3>Editar sexo: {{ $sex->sex }}</h3>
        </div>
        <div class="card-body">
            <hr class="mt-8 mb-12">

            @include('admin.animals.sexes.form')
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
