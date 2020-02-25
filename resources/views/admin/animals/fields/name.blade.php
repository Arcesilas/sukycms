<td class="text-{{ $field->align ?? '' }}">
    <img src="{{ $item->getPhoto() }}" alt="" class="avatar">
    {{ Str::limit($item->name, 30) }}<br>
    <span>{{ $item->getAge() }}</span>
</td>
