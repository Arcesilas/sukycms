<div class="flex mb-10">
    <div class="flex">
        <img src="{{ $model->getPhoto() }}" alt="" class="rounded-full w-32 mr-8">
        <div class="flex flex-col">
            <h4 class="text-xl mb-4">
                {{ __($transNamespace.'.file.title', ['name' => (string) $model]) }}
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
        <a class="inline-block py-2 px-4 text-gray-600 font-semibold border-b border-gray-500" href="#"><i class="fas fa-paw fa-fw"></i> Ficha</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold" href="#"><i class="fas fa-exchange-alt fa-fw"></i> Estado</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold" href="#"><i class="fas fa-images fa-fw"></i> Fotos</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold" href="{{ route('admin.animals.health.index') }}"><i class="fas fa-book-medical fa-fw"></i> Salud</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold" href="#"><i class="fas fa-file-alt fa-fw"></i> Notas</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold" href="#"><i class="fas fa-users fa-fw"></i> Apadrinamientos</a>
    </li>
    <li class="mr-1">
        <a class="inline-block py-2 px-4 text-gray-600 hover:text-gray-700 font-semibold" href="#"><i class="fas fa-coins fa-fw"></i> Costes</a>
    </li>
</ul>
