@extends('layouts.app')

@section('content')
    <div class="h-screen bg-secondary">
        <h1 class="ml-10 text-xl">Edit Movie</h1>

        <div class="bg-white rounded-2xl shadow-lg p-6 mt-10 mx-auto max-w-xxl ml-72 mr-72">
            {!! Form::open(['route' => [ 'movies.update', $movie->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="mb-4">
                {{Form::label('title', 'Title', ['class' => 'block text-gray-700 font-bold mb-2'])}}
                {{Form::text('title', $movie->title, ['class' => 'input input-bordered w-full py-2 px-3', 'placeholder' => 'Title'])}}
            </div>
            <div class="mb-4">
                {{Form::file('cover_image', ['class' => 'file-input file-input-bordered file-input-primary'])}}
            </div>
            <div class="mb-4">
                {{Form::label('body', 'description', ['class' => 'block text-gray-700 font-bold mb-2'])}}
                {{Form::textarea('body', $movie->body, ['id' => 'article-ckeditor', 'class' => 'input input-bordered w-full py-2 px-3 text-gray-700 bg-gray-100 rounded'])}}
            </div>
            <div class="mb-4">
                {{ Form::label('star_rating', 'Rating', ['class' => 'block text-gray-700 font-bold mb-2']) }}
                <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $movie->star_rating)
                            {{ Form::radio('star_rating', $i, true, ['id' => 'star' . $i, 'class' => 'mask mask-star-2 bg-yellow-400 mr-1']) }}
                        @else
                            {{ Form::radio('star_rating', $i, false, ['id' => 'star' . $i, 'class' => 'mask mask-star-2 bg-yellow-400 mr-1']) }}
                        @endif
                        <label for="star{{ $i }}"></label>
                    @endfor
                </div>
            </div>
            <div class="flex items-center justify-between">
                <a href="/dashboard" class="btn bg-primary text-white font-bold py-2 px-4 rounded">Cancel</a>
                {!!Form::hidden('_method','PUT')!!}
                {{Form::submit('Submit', ['class'=>'btn bg-primary text-white font-bold py-2 px-4 rounded'])}}
                {!! Form::close() !!}
            </div>
        </div>
@endsection
