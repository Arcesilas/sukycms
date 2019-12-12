<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ mix('build/auth.css') }}">
    @stack('styles')
</head>
<body class="auth">

    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="auth-logo">

    <div class="auth-form">
        @yield('content')
    </div>

    <script src="{{ mix('build/auth.js') }}"></script>
    @stack('scripts')
</body>
</html>
