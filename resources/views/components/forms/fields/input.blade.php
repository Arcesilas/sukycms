@if ($field->wrapper)
<div class="form-group">
@endif

    @if ($field->show_label)
    <label for="{{ $field->id }}">{{ $field->label }}</label>
    @endif

    <input type="text" name="{{ $field->name }}" id="{{ $field->id }}" value="{{ $field->value ?? '' }}">

@if ($field->wrapper)
</div>
@endif
