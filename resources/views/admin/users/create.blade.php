@extends('admin.layouts.base')

@section('content')

    @include('admin.users.form', [
        'title' => __('users.form.create.title'),
    ])

@endsection
