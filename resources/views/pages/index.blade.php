@extends('layouts.app')

@section('content')
    <h1>Trending movies</h1>
    <div class="row">
        @foreach($trending_movies as $movie)
            <div class="col-4 mb-4">
                <div class="card">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }} poster">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie['title'] }}</h5>
                        <p class="card-text">{{ $movie['overview'] }}</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
