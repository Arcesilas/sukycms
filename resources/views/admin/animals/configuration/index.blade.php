@extends('admin.layouts.base')

@section('content')

    <h4 class="text-xl mb-4">Configuraciones de los animales</h4>
    <div class="text-gray-600">
        <p class="w-2/3 mb-4">En esta sección se pueden configurar los diferentes aspectos de un animal como puede ser su sexo, estado, localización o comportamiento.</p>
        <p class="w-2/3">Por ejemplo si usáis el método CES (capturar, esterilizar y soltar), podéis crear estados y localizaciones para estos casos. Todo es personalizable.</p>
    </div>

    <hr class="my-8">

    <div class="flex flex-wrap">
        <div class="w-1/3 pr-4">
            <div class="card hover:bg-gray-200 cursor-pointer">
                <div class="card-body">
                    <a href="{{ route('admin.animals.sexes') }}" class="flex flex-col text-center text-xl">
                        <span class="icons">
                            <i class="fas fa-mars"></i>
                            <i class="fas fa-venus"></i>
                        </span>
                        <span class="mt-2">Sexos</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="w-1/3 px-4">
            <div class="card hover:bg-gray-200 cursor-pointer">
                <div class="card-body">
                    <div class="flex flex-col text-center text-xl">
                        <span class="icons">
                            <i class="fas fa-location-arrow"></i>
                        </span>
                        <span class="mt-2">Localizaciones</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/3 pl-4">
            <div class="card hover:bg-gray-200 cursor-pointer">
                <div class="card-body">
                    <div class="flex flex-col text-center text-xl">
                        <span class="icons">
                            <i class="fas fa-paw"></i>
                        </span>
                        <span class="mt-2">Especies</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/3 pr-4 mt-8">
            <div class="card hover:bg-gray-200 cursor-pointer">
                <div class="card-body">
                    <div class="flex flex-col text-center text-xl">
                        <span class="icons">
                            <i class="fas fa-list-alt"></i>
                        </span>
                        <span class="mt-2">Estados</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/3 px-4 mt-8">
            <div class="card hover:bg-gray-200 cursor-pointer">
                <div class="card-body">
                    <div class="flex flex-col text-center text-xl">
                        <span class="icons">
                            <i class="fas fa-smile-beam"></i>
                        </span>
                        <span class="mt-2">Comportamientos</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/3 pl-4 mt-8">
            <div class="card hover:bg-gray-200 cursor-pointer">
                <div class="card-body">
                    <div class="flex flex-col text-center text-xl">
                        <span class="icons">
                            <i class="fas fa-images"></i>
                        </span>
                        <span class="mt-2">Fotos y vídeos</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
