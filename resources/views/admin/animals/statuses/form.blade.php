<div class="flex mt-12">
    <div class="w-1/3">
        <h4 class="text-lg">Datos del estado:</h4>
        <p class="help-text">Todos los campos son obligatorios</p>
    </div>
    <div class="w-2/3">
        <div class="flex pt-4">
            <div class="w-1/2 flex px-4">
                {!! $form->renderField('status') !!}
            </div>
        </div>
    </div>
</div>

<hr class="mt-8 mb-6">

<div class="flex justify-between">
    <a href="{{ route('admin.animals.statuses.index') }}" class="btn btn-gray-outline"><i class="fas fa-chevron-left mr-2"></i> Volver</a>

    {!! $form->renderField('save') !!}
</div>
