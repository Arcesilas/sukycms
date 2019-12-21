@if ($field->wrapper)
<div class="form-group">
@endif

    @if ($field->show_label)
        <label for="{{ $field->id }}">
    @endif

    <input type="checkbox" name="{{ $field->name }}" id="{{ $field->id }}" value="{{ $field->value }}">

    @if ($field->show_label)
        {{ $field->label }} </label>
    @endif

    @if ($errors->has($field->name))
        <div class="error-message">{{ $errors->first($field->name) }}</div>
    @endif

@if ($field->wrapper)
</div>
@endif
