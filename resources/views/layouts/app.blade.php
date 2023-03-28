<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MovieList') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')

</head>
<body class="bg-secondary">
    <div id="app">
        @include('inc.navbar')
        <div class="flex flex-col p-4 gap-5 items-center">
            @include('inc.messages')
        </div>

        <div>
            @yield('content')
        </div>

        <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('article-ckeditor');
        </script>
    </div>
</body>
</html>
