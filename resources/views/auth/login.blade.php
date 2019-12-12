@extends('auth.layouts.base')

@section('content')
    {!! $form->renderStart() !!}

    {!! $form->renderField('email') !!}

    {!! $form->renderField('password') !!}

    {!! $form->renderField('login') !!}

    {!! $form->renderEnd() !!}
@endsection
