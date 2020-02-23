<div class="flex mt-12">
    <div class="w-1/3">
        <h4 class="text-lg">Datos del artículo:</h4>
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
                {!! $form->renderField('published_at') !!}
            </div>
            <div class="w-1/2 flex px-4">
                {!! $form->renderField('category_id') !!}
            </div>
        </div>
    </div>
</div>

<hr class="mt-8 mb-12">

<div class="flex mt-12">
    <div class="w-1/3">
        <h4 class="text-lg">Contenido:</h4>
        <p class="help-text">Todos los campos son obligatorios</p>
    </div>
    <div class="w-2/3">
        <div class="flex pt-4">
            <div class="w-full flex px-4">
                {!! $form->renderField('content') !!}
            </div>
        </div>
    </div>
</div>

<hr class="mt-8 mb-6">

<div class="flex justify-end">
    {!! $form->renderField('save') !!}
</div>
