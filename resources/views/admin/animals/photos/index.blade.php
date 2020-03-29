@extends('admin.layouts.base')

@section('content')

    @include('admin.animals.animal_header')

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
                        <div class="dropzone w-full"></div>
                    </div>
                </div>
            </div>

            <hr class="mt-8 mb-8">

            <div class="flex flex-wrap">
                @for($i = 0; $i < mt_rand(3, 10); $i++)
                    <div class="flex w-1/4 justify-center mb-8">
                        <img src="https://picsum.photos/200?random={{ $i }}" alt="">
                    </div>
                @endfor
            </div>
        </div>
    </div>

@endsection
