@extends('admin.layouts.base')

@section('content')

    @include('admin.animals.animal_header')

    {!! $form->renderStart() !!}

    <div class="card">
        <div class="card-body">
            <div class="flex mb-8">
                <div class="w-full">
                    <h4 class="text-lg">Fotos:</h4>
                    <p class="help-text">Elige las fotografías que aparecerán en la ficha del animal. Una vez creada la ficha podrás cambiar la foto principal</p>
                </div>
            </div>
            <div class="flex">
                <div class="animal-form-photos w-full">
                    <div class="w-full flex">
                        {!! $form->renderField('photos[]') !!}
                    </div>
                    <div class="w-full flex">
                        {!! $form->renderField('save') !!}
                    </div>
                </div>
            </div>

            <hr class="mt-8 mb-8">

            <div class="flex flex-wrap">
                @forelse ($model->photos as $photo)
                    <div class="flex w-1/4 justify-center mb-8 px-4">
                        <img src="{{ $photo->getThumbnailUrl() }}" alt="">
                    </div>
                @empty
                    <div class="w-full text-3xl py-20 text-center text-gray-600">
                        <i class="fas fa-images text-5xl mb-12"></i>
                        <h3>
                            No hay fotos de {{ $model->name }}
                        </h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
