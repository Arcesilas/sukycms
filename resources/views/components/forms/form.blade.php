<form action="{{ $form->url }}" method="{{ $form->method }}">
    @csrf

    @foreach ($form->fields as $field)
        {!! $field->render() !!}
    @endforeach

</form>
