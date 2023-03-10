<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name', 'MovieList')}}</title>
    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')
</head>
<body class="bg bg-secondary">
    @include('inc.navbar')
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
