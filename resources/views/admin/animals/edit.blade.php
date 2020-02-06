@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    <div class="card">
        <div class="card-title flex flex-row justify-between">
            <h3><img src="{{ $animal->getPhoto() }}" alt="{{ $animal->name }}" class="rounded-full inline h-12 mr-2"> {{ __('animals.form.edit.title', ['name' => $animal->name]) }}</h3>
        </div>
        <div class="card-body">

            <hr class="mt-8 mb-12">

            @include('admin.animals.form', [
                'animal' => $animal,
                'form' => $form,
                'behaviors' => $behaviors,
            ])

        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
