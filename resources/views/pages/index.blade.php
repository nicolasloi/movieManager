@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Trending movies</h1>
    <div class="flex flex-wrap -mx-4">
        @foreach($trending_movies as $movie)
            <div class="w-full md:w-1/2 lg:w-1/6 p-4">
                <div class="bg-white rounded-lg shadow-lg">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="w-full rounded-t-lg"
                         alt="{{ $movie['title'] }} poster">
                    <div class="p-4">
                        <h5 class="text-lg font-bold mb-2">{{ $movie['title'] }}</h5>
                        <p class="text-gray-700 text-base leading-relaxed mb-4">{{ $movie['overview'] }}</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
