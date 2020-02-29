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

    <textarea type="text" name="{{ $field->name }}" id="{{ $field->id }}" class="tinymce"
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
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.tinymce",
            height: 400,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endpush
