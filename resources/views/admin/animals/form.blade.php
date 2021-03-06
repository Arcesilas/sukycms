<div class="flex">
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
                {!! $form->renderField('birth_date') !!}
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
    </div>
</div>

@if (Request::routeIs('admin.animals.create'))
    <hr class="mt-8 mb-12">

    <div class="flex">
        <div class="w-1/3">
            <h4 class="text-lg">Situación del animal:</h4>
            <p class="help-text">Todos los campos son obligatorios</p>
        </div>
        <div class="w-2/3">
            <div class="flex pt-4">
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('status_id') !!}
                </div>
                <div class="w-1/2 flex px-4">
                    {!! $form->renderField('location_id') !!}
                </div>
            </div>
        </div>
    </div>
@endif

<hr class="mt-8 mb-12">

<div class="flex mt-12">
    <div class="w-1/3 mb-4">
        <h4 class="text-lg cursor-pointer" data-toggle="show" data-item=".animal-form-optional"><i
                class="far fa-plus-square"></i> Información opcional:</h4>
        <p class="help-text">Todos los campos son obligatorios</p>
    </div>
    <div class="animal-form-optional w-2/3 hidden">
        <div class="flex pt-4">
            <div class="w-1/2 flex px-4">
                {!! $form->renderField('identifier') !!}
            </div>
            <div class="w-1/2 flex px-4">
                {!! $form->renderField('microchip') !!}
            </div>
        </div>
        <div class="flex pt-4">
            <div class="w-1/2 flex px-4">
                {!! $form->renderField('breed') !!}
            </div>
            <div class="w-1/2 flex px-4">
                {!! $form->renderField('litter') !!}
            </div>
        </div>
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

@if (! Request::routeIs('admin.animals.edit'))
    <hr class="mt-8 mb-12">

    <div class="flex mt-12">
        <div class="w-1/3">
            <h4 class="text-lg cursor-pointer" data-toggle="show" data-item=".animal-form-photos"><i
                    class="far fa-plus-square"></i> Fotos:</h4>
            <p class="help-text">Elige las fotografías que aparecerán en la ficha del animal. Una vez creada la ficha podrás
                cambiar la foto principal</p>
        </div>
        <div class="animal-form-photos w-2/3 hidden">
            <div class="w-full flex px-4">
                <div class="dropzone w-full"></div>
            </div>
        </div>
    </div>
@endif

<hr class="mt-8 mb-12">

<div class="flex mt-12">
    <div class="w-1/3">
        <h4 class="text-lg cursor-pointer" data-toggle="show" data-item=".animal-form-behavior"><i
                class="far fa-plus-square"></i> Comportamiento:</h4>
        <p class="help-text">Todos los campos son obligatorios</p>
    </div>
    <div class="animal-form-behavior w-2/3 hidden">
        <div class="flex flex-wrap px-4">
            @foreach ($behaviors as $behavior)
                <div class="w-1/3">
                    <label class="text-xs"><input type="checkbox" name="behaviors[]"
                                                  value="{{ $behavior->id }}" {{ isset($animal) && $animal->hasBehavior($behavior->id) ? 'checked' : '' }}> {{ $behavior->behavior }}
                    </label>
                </div>
            @endforeach
        </div>
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
