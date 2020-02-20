<td class="text-{{ $field->align ?? '' }}">
    @if (! $loop->parent->first)
        <a href="{{ route("{$routeNamespace}.up", $item) }}" class="text-green-500" data-tooltip="Subir">
            <i class="fas fa-arrow-up fa-fw"></i>
        </a>
    @endif
    {{ $item->order }}
    @if (! $loop->parent->last)
        <a href="{{ route("{$routeNamespace}.down", $item) }}" class="text-green-500" data-tooltip="Bajar">
            <i class="fas fa-arrow-down fa-fw"></i>
        </a>
    @endif
</td>
