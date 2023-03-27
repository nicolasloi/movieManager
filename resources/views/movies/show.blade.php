@extends('layouts.app')

@section('content')
    <a href="/dashboard" class="btn btn-primary text-white">Go Back</a>
    <h1>{{$movie->title}}</h1>
    @if($movie->cover_image == 'noImage.jpg')

    @else
        <div class="w-1/2">
            <img class="w-full" src="/storage/cover_images/{{$movie->cover_image}}" alt="img"/>
        </div>
    @endif
    <div>
        {!!$movie->body!!}
    </div>
    <hr class="text-primary">
    <small> view on {{$movie->created_at}} </small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $movie->user_id)
            <a href="/movies/{{$movie->id}}/edit"
               class="btn btn-primary py-2 text-white btn-sm">Edit</a>
            {!! Form::open(['route' => ['movies.destroy', $movie->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure you want to remove this movie ?")']) !!}
            {!!Form::hidden('_method','DELETE')!!}
            {{ Form::submit('Delete', ['class'=>'btn btn-error py-2 text-white btn-sm']) }}
            {!! Form::close() !!}
        @endif
    @endif
@endsection
