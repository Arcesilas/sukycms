<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ option('name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ mix('build/admin.css') }}">
    @stack('styles')
</head>
<body>

    <div id="wrapper">
        @include('admin.layouts.sidebar')
        <div class="content-wrapper">
            @include('admin.layouts.header')
            <div class="content">
                @yield('content')

                @include('admin.layouts.footer')
            </div>
        </div>
    </div>

    <script src="{{ mix('build/admin.js') }}"></script>
    @stack('scripts')
    @include('components.flash_notification')
</body>
</html>
