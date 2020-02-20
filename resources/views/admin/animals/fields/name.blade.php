<td class="text-{{ $field->align ?? '' }}">
    <img src="{{ $item->getPhoto() }}" alt="" class="avatar">
    {{ $item->name }}<br>
    <span>{{ $item->birth_date->shortAbsoluteDiffForHumans() }}</span>
</td>
