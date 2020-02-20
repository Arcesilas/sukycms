<div class="flex mt-12">
    <div class="w-1/3">
        <h4 class="text-lg">Datos del usuario:</h4>
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
                {!! $form->renderField('email') !!}
            </div>
            <div class="w-1/2 flex px-4">

            </div>
        </div>
        <div class="flex pt-4">
            <div class="w-1/2 flex px-4">
                {!! $form->renderField('password') !!}
            </div>
            <div class="w-1/2 flex px-4">
                {!! $form->renderField('password_confirmation') !!}
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

<div class="flex mt-12">
    <div class="w-1/3 mb-4">
        <h4 class="text-lg">Avatar:</h4>
        <p class="help-text">Debe tener un tamaño máximo de 600x600 píxeles y pesar menos de 500kb</p>
    </div>
    <div class="animal-form-optional w-2/3">
        <div class="flex pt-4">
            <div class="w-full flex flex-col px-4">
                @if (!empty($model->avatar))
                    <img src="{{ $model->getAvatar() }}" class="rounded-full mb-8" style="max-width: 5rem">
                @endif

                {!! $form->renderField('avatar') !!}
            </div>
        </div>
    </div>
</div>

<hr class="mt-8 mb-12">

<div class="flex justify-end">
    {!! $form->renderField('save') !!}
</div>
