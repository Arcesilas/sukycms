@if ($field->wrapper)
<div class="form-group">
@endif

    <button type="submit" id="{{ $field->id }}" class="{{ $field->class }}">
        @if ($field->icon)
            <i class="{{ $field->icon }} mr-2"></i>
        @endif
        <span>{{ $field->label }}</span>
    </button>

@if ($field->wrapper)
</div>
@endif
