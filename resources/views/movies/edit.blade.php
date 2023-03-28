@extends('layouts.app')

@section('content')
    <h1>Edit Movie</h1>

    {!! Form::open(['route' => [ 'movies.update', $movie->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $movie->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group p-6">
        {{Form::file('cover_image', ['class' => 'file-input file-input-bordered file-input-primary w-full max-w-xs', 'id' => 'cover_image_input', 'onchange' => 'updateFileName(this)'])}}
        <span></span>
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', $movie->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
        {{ Form::label('star_rating', 'Rating') }}
        <div class="rating">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $movie->star_rating)
                    {{ Form::radio('star_rating', $i, true, ['id' => 'star' . $i, 'class' => 'mask mask-star-2 bg-green-500']) }}
                @else
                    {{ Form::radio('star_rating', $i, false, ['id' => 'star' . $i, 'class' => 'mask mask-star-2 bg-green-500']) }}
                @endif
                <label for="star{{ $i }}"></label>
            @endfor
        </div>
    </div>
    {!!Form::hidden('_method','PUT')!!}
    {{Form::submit('Submit', ['class'=>'btn btn-primary text-white'])}}
    {!! Form::close() !!}
@endsection
