@if ($field->wrapper)
<div class="form-group">
@endif

    <button type="submit" id="{{ $field->id }}" class="{{ $field->class }}">{{ $field->label }}</button>

@if ($field->wrapper)
</div>
@endif
