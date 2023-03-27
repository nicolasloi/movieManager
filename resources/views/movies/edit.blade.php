@extends('layouts.app')

@section('content')
    <h1>Edit Movie</h1>

    {!! Form::open(['route' => [ 'movies.update', $movie->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $movie->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group p-6">
        {{Form::file('cover_image', ['class' => 'file-input file-input-bordered file-input-primary w-full max-w-xs'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', $movie->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
        {{ Form::label('star_rating', 'Rating') }}
        <div class="rating">
            {{ Form::radio('star_rating', '1', true, ['id' => 'star1', 'class' => 'mask mask-star-2 bg-green-500']) }}
            <label for="star1"></label>

            {{ Form::radio('star_rating', '2', false, ['id' => 'star2', 'class' => 'mask mask-star-2 bg-green-500']) }}
            <label for="star2"></label>

            {{ Form::radio('star_rating', '3', false, ['id' => 'star3', 'class' => 'mask mask-star-2 bg-green-500']) }}
            <label for="star3"></label>

            {{ Form::radio('star_rating', '4', false, ['id' => 'star4', 'class' => 'mask mask-star-2 bg-green-500']) }}
            <label for="star4"></label>

            {{ Form::radio('star_rating', '5', false, ['id' => 'star5', 'class' => 'mask mask-star-2 bg-green-500']) }}
            <label for="star5"></label>
        </div>
    </div>
    {!!Form::hidden('_method','PUT')!!}
    {{Form::submit('Submit', ['class'=>'btn btn-primary text-white'])}}
    {!! Form::close() !!}
@endsection
