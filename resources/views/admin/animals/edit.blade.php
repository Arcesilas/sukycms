@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    <h4 class="text-xl mb-4">{{ __($transNamespace.'.edit.title', ['name' => (string) $model]) }}</h4>

    <ul class="flex mb-4">
        <li class="-mb-px mr-1">
            <a class="inline-block py-2 px-4 text-gray-600 font-semibold border-b border-gray-600" href="#"><i class="fas fa-paw fa-fw"></i> Ficha</a>
        </li>
        <li class="mr-1">
            <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-600 font-semibold" href="#"><i class="fas fa-exchange-alt fa-fw"></i> Movimientos</a>
        </li>
        <li class="mr-1">
            <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-600 font-semibold" href="#"><i class="fas fa-book-medical fa-fw"></i> Salud</a>
        </li>
        <li class="mr-1">
            <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-600 font-semibold" href="#"><i class="fas fa-file-alt fa-fw"></i> Notas</a>
        </li>
        <li class="mr-1">
            <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-600 font-semibold" href="#"><i class="fas fa-users fa-fw"></i> Apadrinamientos</a>
        </li>
    </ul>

    <div class="card">
        <div class="card-body">
            @include($viewNamespace.'.form')
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
