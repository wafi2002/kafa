<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kafa') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Load vite -->
    @vite(['resources/css/app.css','resources/js/app.js'])

    <!-- use livewire in laravel /*Uncomment to use*/ -->
    @livewireStyles

    @stack('styles')
</head>

<body class="@yield('main-class')">
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Jquery -->
    <script src="{{ asset('assets/dist/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- Load livewire script -->
    @livewireScripts

    @stack('scripts')
</body>


</html>