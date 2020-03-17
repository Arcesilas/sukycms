@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    <h4 class="text-xl mb-8">{{ __('shelter.form.edit.title') }}</h4>

    <div class="card">
        <div class="card-body">
            <div class="flex">
                <div class="w-1/3">
                    <h4 class="text-lg">Datos de la asociación:</h4>
                    <p class="help-text">Todos los campos son obligatorios</p>
                </div>
                <div class="w-2/3">
                    <div class="flex pt-4">
                        <div class="w-full flex px-4">
                            {!! $form->renderField('name') !!}
                        </div>
                    </div>
                    <div class="flex pt-4">
                        <div class="w-full flex px-4">
                            {!! $form->renderField('email') !!}
                        </div>
                    </div>
                    <div class="flex pt-4">
                        <div class="w-full flex px-4">
                            {!! $form->renderField('description') !!}
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-8 mb-12">

            <div class="flex">
                <div class="w-1/3">
                    <h4 class="text-lg">Dirección de la asociación:</h4>
                    <p class="help-text">Estos campos no se mostrarán públicamente en ningún sitio de la página web</p>
                </div>
                <div class="w-2/3">
                    <div class="flex pt-4">
                        <div class="w-3/4 flex px-4">
                            {!! $form->renderField('address') !!}
                        </div>
                        <div class="w-1/4 flex px-4">
                            {!! $form->renderField('postal_code') !!}
                        </div>
                    </div>
                    <div class="flex pt-4">
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('city') !!}
                        </div>
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('country') !!}
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-8 mb-6">

            <div class="flex justify-end">
                {!! $form->renderField('save') !!}
            </div>
        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
