@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    <div class="card">
        <div class="card-title flex flex-row justify-between">
            <h3>{{ __('shelter.form.edit.title') }}</h3>
        </div>
        <div class="card-body">
            <hr class="mt-8 mb-12">
            <div class="flex mt-12">
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
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('language') !!}
                        </div>
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('timezone') !!}
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
