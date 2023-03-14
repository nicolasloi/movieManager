@extends('layouts.app')

@section('content')
    <a href="/movies" class="btn btn-default">Go Back</a>
    <h1>{{$movie->title}}</h1>
    <div>
        {{$movie->body}}
    </div>
    <small>view on {{$movie->created_at}}</small>
@endsection
