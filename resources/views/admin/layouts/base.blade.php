<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ option('name') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ mix('build/admin.css') }}">
    @stack('styles')
</head>
<body>

    <div id="wrapper">
        @include('admin.layouts.sidebar')
        <div class="content-wrapper">
            @include('admin.layouts.header')
            <div class="content pt-8 pb-16 px-8">
                @yield('content')

                @include('admin.layouts.footer')
            </div>
        </div>
    </div>

    <script>
        window.SukyCMS = {
            dateFormat: '{{ option('date_format') }}',
            datetimeFormat: '{{ option('datetime_format') }}',
            lang: {
                confirm: {
                    title: '¿Estás seguro?',
                    text: 'Esta acción es irreversible.',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'Cancelar',
                }
            }
        }
    </script>

    <script src="{{ mix('build/admin.js') }}"></script>
    @stack('scripts')
    @include('components.flash_notification')
</body>
</html>
