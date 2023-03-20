<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name', 'MovieList')}}</title>
    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')
</head>
<body class="bg-secondary">
    @include('inc.navbar')
    <div class="flex flex-col p-4 gap-5 items-center">
        @include('inc.messages')
    </div>
    @yield('content')

    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"> </script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
