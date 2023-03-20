@extends('layouts.app')

@section('content')
    <a href="/movies" class="btn btn-primary text-white">Go Back</a>
    <h1>{{$movie->title}}</h1>
    <div>
        {!!$movie->body!!}
    </div>
    <hr class="text-primary">
    <small> view on {{$movie->created_at}} </small>
    <hr>
    <a href="/movies/{{$movie->id}}/edit" class="btn btn-primary text-white">Edit</a>


    {!! Form::open(['route' => ['movies.destroy', $movie->id], 'method' => 'POST']) !!}
    {!!Form::hidden('_method','DELETE')!!}
    {{ Form::submit('Delete', ['class'=>'btn btn-error text-white']) }}
    {!! Form::close() !!}
@endsection
