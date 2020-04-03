<td class="actions visible">
    <ul>
        <li>
            <a href="{{ route($routeNamespace.'.edit', isset($parent) ? [$parent, $item] : $item) }}" class="text-blue-500" data-tooltip="Editar">
                <i class="fas fa-edit fa-fw"></i>
            </a>
        </li>
        <li>
            <form action="{{ route($routeNamespace.'.destroy', isset($parent) ? [$parent, $item] : $item) }}" method="POST" class="inline confirm">
                @method('DELETE')
                @csrf

                <button class="text-red-500" data-tooltip="Eliminar">
                    <i class="fas fa-trash-alt fa-fw"></i>
                </button>
            </form>
        </li>
    </ul>
</td>
