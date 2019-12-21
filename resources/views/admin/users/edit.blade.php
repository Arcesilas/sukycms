@extends('admin.layouts.base')

@section('content')

    {!! $form->renderStart() !!}

    <div class="card">
        <div class="card-title flex flex-row justify-between">
            <h3>{{ __('users.form.edit.title', [
                'name' => $user->name,
            ]) }}</h3>
        </div>
        <div class="card-body">
            <hr class="mt-8 mb-12">
            <div class="flex mt-12">
                <div class="w-1/3">
                    <h4 class="text-lg">Datos de la cuenta:</h4>
                    <p class="help-text">Todos los campos son obligatorios</p>
                </div>
                <div class="w-2/3">
                    <div class="flex pt-4">
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('name') !!}
                        </div>
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('email') !!}
                        </div>
                    </div>
                    <div class="flex pt-4">
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('role') !!}
                        </div>
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('status') !!}
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-8 mb-12">

            <div class="flex">
                <div class="w-1/3">
                    <h4 class="text-lg">Cambiar contraseña:</h4>
                    <p class="help-text">Debe contener al menos 6 caracteres<br>Si la dejas en blanco no se modificará</p>
                </div>
                <div class="w-2/3">
                    <div class="flex pt-4">
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('password') !!}
                        </div>
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('password_confirmation') !!}
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-8 mb-12">

            <div class="flex">
                <div class="w-1/3">
                    <h4 class="text-lg">Avatar:</h4>
                    <p class="help-text">
                        Tamaño máximo 500kb y resolución 1000x1000 píxeles<br>
                        Si no selecciona ninguno se mantendrá el actual
                    </p>
                </div>
                <div class="w-2/3">
                    <div class="flex pt-4">
                        <div class="w-1/2 flex px-4 justify-center">
                            <img src="{{ $user->getAvatar() }}" alt="" class="w-12 h-12 rounded-full">
                        </div>
                        <div class="w-1/2 flex px-4">
                            {!! $form->renderField('avatar') !!}
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
