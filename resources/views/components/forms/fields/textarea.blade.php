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

    <textarea type="text" name="{{ $field->name }}" id="{{ $field->id }}" class="ckeditor"
    @foreach ($field->options as $key => $value)
        {{ $key }}="{{ $value }}"
    @endforeach
    >{{ old($field->name, $field->value) }}</textarea>

    @if ($errors->has($field->name))
        <div class="error-message">{{ $errors->first($field->name) }}</div>
    @endif

@if ($field->wrapper)
</div>
@endif

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.config.height = 300;
        CKEDITOR.config.language = 'es';
    </script>
@endpush
