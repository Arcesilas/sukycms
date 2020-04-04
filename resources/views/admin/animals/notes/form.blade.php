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
            <div class="w-1/3 flex px-4">
                {!! $form->renderField('date') !!}
            </div>
        </div>
    </div>
</div>

<hr class="mt-8 mb-12">

<div class="flex mt-12">
    <div class="w-1/3">
        <h4 class="text-lg cursor-pointer" data-toggle="show" data-item=".animal-notes-form-attachments"><i
                class="far fa-plus-square"></i> Adjuntos:</h4>
        <p class="help-text">Adjunta archivos relacionados con este registro de salud del animal como facturas, radiografías, fotos u otros...</p>
    </div>
    <div class="animal-notes-form-attachments w-2/3 hidden">
        <div class="w-full flex px-4">
            {!! $form->renderField('attachments[]') !!}
        </div>
        @if (Request::routeIs('admin.animals.notes.edit'))
            <hr class="mt-4 mb-8">
            <div class="flex flex-wrap w-full">
                @foreach ($model->attachments as $attachment)
                    <div class="w-1/3 flex px-4 mb-8 justify-center">
                        <a href="{{ $attachment->getUrl() }}" target="_blank" class="flex flex-col items-center break-words">
                            <div class="w-32 h-32 bg-gray-200 rounded flex items-center justify-center">
                                {{ $attachment->getExtension() }}
                            </div>
                            <span class="w-full text-center">{{ $attachment->getName() }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<hr class="mt-8 mb-6">

<div class="flex mt-12">
    <div class="w-1/3">
        <h4 class="text-lg">Texto:</h4>
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
    <a href="{{ route('admin.animals.notes.index', $parent) }}" class="btn btn-gray-outline"><i class="fas fa-chevron-left mr-2"></i> Volver</a>

    {!! $form->renderField('save') !!}
</div>
