<td class="text-{{ $field->align ?? '' }}">
    <img src="{{ $item->getAvatar() }}" alt="" class="avatar">
    {{ Str::limit($item->name, 30) }}<br>
    <span>{{ __("users.roles.{$item->role}") }}</span>
</td>
