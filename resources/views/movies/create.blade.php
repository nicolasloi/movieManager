@extends('layouts.app')

@section('content')
    <h1>Add New Movie</h1>

    {!! Form::open(['route' => 'movies.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group p-6">
        {{Form::file('cover_image', ['class' => 'file-input file-input-bordered file-input-primary w-full max-w-xs'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
        {{ Form::label('star_rating', 'Rating') }}
        @php
            $ratings = [1, 2, 3, 4, 5];
        @endphp

        {{ Form::label('star_rating', 'Rating') }}
        <div class="rating">
            @for ($i = 0; $i < count($ratings); $i++)
                @if ($ratings[$i] == 1)
                    {{ Form::radio('star_rating', $ratings[$i], true, ['id' => 'star' . $ratings[$i], 'class' => 'mask mask-star-2 bg-green-500']) }}
                @else
                    {{ Form::radio('star_rating', $ratings[$i], false, ['id' => 'star' . $ratings[$i], 'class' => 'mask mask-star-2 bg-green-500']) }}
                @endif
                <label for="star{{ $ratings[$i] }}"></label>
            @endfor
        </div>
    </div>
    <div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary text-white'])}}
    {!! Form::close() !!}

        <a href="/dashboard" class="btn btn-primary text-white">Cancel</a>

    </div>
@endsection


