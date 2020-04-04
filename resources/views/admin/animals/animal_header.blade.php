<div class="flex mb-10">
    <div class="flex">
        <img src="{{ $model->getPhoto() }}" alt="" class="rounded-full w-32 mr-8">
        <div class="flex flex-col">
            <h4 class="text-xl mb-4">
                {{ __('animals.file.title', ['name' => (string) $model]) }}
            </h4>
            <p>{{ $model->getAge() }}</p>
            <p>{{ $model->status }}</p>
            <p>{{ $model->species }}</p>
            <p>{{ $model->location }}</p>
        </div>
    </div>
</div>

<ul class="flex mb-4">
    <li class="-mb-px mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 font-semibold {{ Request::routeIs('admin.animals.edit') ? 'border-b border-gray-500' : '' }}" href="{{ route('admin.animals.edit', $model) }}"><i class="fas fa-paw fa-fw"></i> Ficha</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold" href="#"><i class="fas fa-exchange-alt fa-fw"></i> Estado</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold {{ Request::routeIs('admin.animals.photos.index') ? 'border-b border-gray-500' : '' }}" href="{{ route('admin.animals.photos.index', $model) }}"><i class="fas fa-images fa-fw"></i> Fotos</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold {{ Request::is('admin/animals/*/health*') ? 'border-b border-gray-500' : '' }}" href="{{ route('admin.animals.health.index', $model) }}"><i class="fas fa-book-medical fa-fw"></i> Salud</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold {{ Request::is('admin/animals/*/notes*') ? 'border-b border-gray-500' : '' }}" href="{{ route('admin.animals.notes.index', $model) }}"><i class="fas fa-file-alt fa-fw"></i> Notas</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold" href="#"><i class="fas fa-users fa-fw"></i> Apadrinamientos</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold" href="#"><i class="fas fa-list-ul fa-fw"></i> Resumen</a>
    </li>
</ul>
