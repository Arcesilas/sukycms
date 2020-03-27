@if ($field->wrapper)
<div class="form-group">
@endif

    @if ($field->show_label)
        <label for="{{ $field->id }}">
            {{ $field->label }}
            @if ($field->help_text)
                <i class="fas fa-question-circle" data-tooltip="{{ $field->help_text }}"></i>
            @endif
        </label>
    @endif

    <input type="number" name="{{ $field->name }}" id="{{ $field->id }}" value="{{ old($field->name, $field->value) }}" class="{{ $field->class }}"
    @foreach ($field->options as $key => $value)
        {{ $key }}="{{ $value }}"
    @endforeach
    >

    @if ($errors->has($field->name))
        <div class="error-message">{{ $errors->first($field->name) }}</div>
    @endif

@if ($field->wrapper)
</div>
@endif
