@extends('layouts.app')

@section('content')
    <div class="h-screen bg-secondary">
        <h1 class="ml-11 text-xl">Trending movies</h1>
        <div class="flex flex-row overflow-x-auto mt-12 ml-8 mr-8">
            @foreach ($trending_movies as $movie)
                <div class="w-48 flex-shrink-0 flex flex-col shadow-lg mx-2">
                    <div class="relative">
                        <img class="h-72 w-full rounded-t-lg"
                             src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                             alt="{{ $movie['title'] }} poster">
                    </div>
                    <div class="bg-white p-4 flex flex-col flex-1 rounded-b-lg">
                        <h5 class="text-lg font-bold mb-2">{{ $movie['title'] }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
