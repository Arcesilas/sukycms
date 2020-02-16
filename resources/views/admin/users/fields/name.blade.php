<td class="text-{{ $field->align ?? '' }}">
    <img src="{{ $item->getAvatar() }}" alt="" class="avatar">
    {{ $item->name }}<br>
    <span>{{ __("users.roles.{$item->role}") }}</span>
</td>