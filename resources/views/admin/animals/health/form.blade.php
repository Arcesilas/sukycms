<div class="flex mt-12">
    <div class="w-1/3">
        <h4 class="text-lg">Datos del registro:</h4>
        <p class="help-text">Todos los campos son obligatorios</p>
    </div>
    <div class="w-2/3">
        <div class="flex pt-4">
            <div class="w-full flex px-4">
                {!! $form->renderField('title') !!}
            </div>
        </div>
        <div class="flex pt-4">
            <div class="w-1/2 flex px-4">
                {!! $form->renderField('start_date') !!}
            </div>
            <div class="w-1/2 flex px-4">
                {!! $form->renderField('end_date') !!}
            </div>
        </div>
    </div>
</div>

<hr class="mt-8 mb-12">

<div class="flex mt-12">
    <div class="w-1/3">
        <h4 class="text-lg">Tipo de registro:</h4>
        <p class="help-text">Todos los campos son obligatorios</p>
    </div>
    <div class="w-2/3">
        <div class="flex pt-4">
            <div class="w-1/2 flex px-4">
                {!! $form->renderField('type') !!}
            </div>
        </div>

        <div class="hidden" data-select-toggle="treatment" data-select-toggle-parent="type">
            <div class="flex pt-4">
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('treatments_number') !!}
                </div>
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('treatments_life') !!}
                </div>
            </div>
            <div class="flex pt-4">
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('treatments_each') !!}
                </div>
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('treatments_time') !!}
                </div>
            </div>
        </div>

        <div class="hidden" data-select-toggle="test" data-select-toggle-parent="type">
            <div class="flex pt-4">
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('test') !!}
                </div>
            </div>
            <div class="flex pt-4">
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('test_result') !!}
                </div>
            </div>
        </div>

        <div class="hidden" data-select-toggle="vaccine" data-select-toggle-parent="type">
            <div class="flex pt-4">
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('vaccine') !!}
                </div>
            </div>
        </div>

        <div class="hidden" data-select-toggle="disease" data-select-toggle-parent="type">
            <div class="flex pt-4">
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('disease') !!}
                </div>
            </div>
            <div class="flex pt-4">
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('medicine') !!}
                </div>
            </div>
            <div class="flex pt-4">
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('treatments_number') !!}
                </div>
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('treatments_life') !!}
                </div>
            </div>
            <div class="flex pt-4">
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('treatments_each') !!}
                </div>
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('treatments_time') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="mt-8 mb-12">

<div class="flex mt-12">
    <div class="w-1/3">
        <h4 class="text-lg">Adjuntos:</h4>
        <p class="help-text">Adjunta archivos relacionados con este registro de salud del animal como facturas, radiografías, fotos u otros...</p>
    </div>
    <div class="w-2/3">
        <div class="w-full flex px-4">
            <div class="dropzone w-full"></div>
        </div>
    </div>
</div>

<hr class="mt-8 mb-6">

<div class="flex mt-12">
    <div class="w-1/3">
        <h4 class="text-lg">Observaciones:</h4>
        <p class="help-text">Todos los campos son obligatorios</p>
    </div>
    <div class="w-2/3">
        <div class="flex pt-4">
            <div class="w-full flex px-4">
                {!! $form->renderField('text') !!}
            </div>
        </div>
    </div>
</div>

<hr class="mt-8 mb-6">

<div class="flex justify-between">
    <a href="{{ route('admin.animals.health.index', $parent) }}" class="btn btn-gray-outline"><i class="fas fa-chevron-left mr-2"></i> Volver</a>

    {!! $form->renderField('save') !!}
</div>
