@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    <div class="card">
        <div class="card-title flex flex-row justify-between">
            <h3>{{ __('animals.form.create.title') }}</h3>
        </div>
        <div class="card-body">
            <hr class="mt-8 mb-12">
            <div class="flex mt-12">
                <div class="w-1/3">
                    <h4 class="text-lg">Datos del animal:</h4>
                    <p class="help-text">Todos los campos son obligatorios</p>
                </div>
                <div class="w-2/3">
                    <div class="flex pt-4">
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('name') !!}
                        </div>
                        <div class="w-1/2 flex px-4">

                        </div>
                    </div>
                    <div class="flex pt-4">
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('species_id') !!}
                        </div>
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('sex_id') !!}
                        </div>
                    </div>
                    <div class="flex pt-4">
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('location_id') !!}
                        </div>
                        <div class="w-1/2 flex px-4">

                        </div>
                    </div>
                    <div class="flex pt-4">
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('birth_date') !!}
                        </div>
                        <div class="w-1/2 flex px-4">

                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-8 mb-12">

            <div class="flex mt-12">
                <div class="w-1/3">
                    <h4 class="text-lg">Información opcional:</h4>
                    <p class="help-text">Todos los campos son obligatorios</p>
                </div>
                <div class="w-2/3">
                    <div class="flex pt-4">
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('entry_date') !!}
                        </div>
                        <div class="w-1/2 flex px-4">

                        </div>
                    </div>
                    <div class="flex pt-4">
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('urgent') !!}
                        </div>
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('special') !!}
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-8 mb-12">

            <div class="flex mt-12">
                <div class="w-1/3">
                    <h4 class="text-lg">Comportamiento:</h4>
                    <p class="help-text">Todos los campos son obligatorios</p>
                </div>
                <div class="w-2/3">
                    
                </div>
            </div>

            <hr class="mt-8 mb-12">

            <div class="flex mt-12">
                <div class="w-1/3">
                    <h4 class="text-lg">Descrición:</h4>
                    <p class="help-text">Explica la historia del animal</p>
                </div>
                <div class="w-2/3">
                    <div class="flex pt-4">
                        <div class="w-full flex px-4">
                            {!! $form->renderField('description') !!}
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-8 mb-12">

            <div class="flex justify-end">
                {!! $form->renderField('save') !!}
            </div>

        </div>
    </div>

    {!! $form->renderEnd() !!}

@endsection
