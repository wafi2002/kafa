<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/parent.css">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">

</head>

<body style="background-color: {{ $bg_color }};">

    <!--Main Navigation-->
    <header>
        <!-- Navbar -->
        <x-header-layout :nav-items="$navItems" />
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4"></div>
    </main>

    <!-- Content -->
    <div class="mt-2 ">
        <div class="container">
            {{ $slot }}
        </div>
    </div>


    <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>