<td class="actions visible">
    <ul>
        <li>
            <a href="{{ route($routeNamespace.'.edit', $item) }}" class="text-blue-500" data-tooltip="Editar">
                <i class="fas fa-edit fa-fw"></i>
            </a>
        </li>
        <li>
            <form action="{{ route($routeNamespace.'.destroy', $item) }}" method="POST" class="inline">
                @method('DELETE')
                @csrf

                <button class="text-red-500" data-tooltip="Eliminar">
                    <i class="fas fa-trash-alt fa-fw"></i>
                </button>
            </form>
        </li>
    </ul>
</td>
