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

    <div class="relative">
        <select type="text" name="{{ $field->name }}" id="{{ $field->id }}" class="{{ $field->class }}"
        @foreach ($field->options as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
        >
            @if ($field->emptyOption)
                <option value="" disabled selected>- Seleccione -</option>
            @endif
            @foreach ($field->choices as $key => $value)
                @if (is_array($value))
                    <optgroup label="{{ $key }}">
                        @foreach ($value as $subKey => $subValue)
                            <option value="{{ $subKey }}" {{ $subKey == $field->selected ? 'selected' : '' }}>{{ $subValue }}</option>
                        @endforeach
                    </optgroup>
                @else
                    <option value="{{ $key }}" {{ $key == old($field->name, $field->selected) ? 'selected' : '' }}>{{ $value }}</option>
                @endif
            @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
    </div>

    @if ($errors->has($field->name))
        <div class="error-message">{{ $errors->first($field->name) }}</div>
    @endif

@if ($field->wrapper)
</div>
@endif
