@extends('layouts.app')

@section('content')
    <div class="h-screen bg-secondary">
        <h1 class="ml-11 text-xl">Trending movies</h1>
        <div class="flex w-max p-5 gap-5 overflow-x-scroll">
            @foreach($trending_movies as $trending_movie)
                <div class="w-full">
                    <div class="bg-white rounded-lg shadow-lg">
                        <img src="https://image.tmdb.org/t/p/w500{{ $trending_movie['poster_path'] }}"
                             class="w-full rounded-t-lg"
                             alt="{{ $trending_movie['title'] }} poster">
                        <div class="p-4">
                            <h5 class="text-lg font-bold mb-2">{{ $trending_movie['title'] }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
