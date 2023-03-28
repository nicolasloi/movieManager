@extends('layouts.app')

@section('content')
    <div class="h-screen bg-secondary">
        <h1 class="ml-10 text-xl">Add new Movie</h1>

        <div class="bg-white rounded-2xl shadow-lg p-6 mt-10 mx-auto max-w-lg">
            {!! Form::open(['route' => 'movies.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="mb-4">
                {{Form::label('title', 'Title', ['class' => 'block text-gray-700 font-bold mb-2'])}}
                {{Form::text('title', '', ['class' => 'input input-bordered w-full py-2 px-3', 'placeholder' => 'Title'])}}
            </div>
            <div class="mb-4">
                {{Form::file('cover_image', ['class' => 'file-input file-input-bordered file-input-primary'])}}
            </div>
            <div class="mb-4">
                {{Form::label('body', 'Body', ['class' => 'block text-gray-700 font-bold mb-2'])}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'input input-bordered w-full py-2 px-3', 'placeholder' => 'Body Text'])}}
            </div>
            <div class="mb-4">
                {{ Form::label('star_rating', 'Rating', ['class' => 'block text-gray-700 font-bold mb-2']) }}
                @php
                    $ratings = [1, 2, 3, 4, 5];
                @endphp

                <div class="rating flex items-center">
                    @for ($i = 0; $i < count($ratings); $i++)
                        @if ($ratings[$i] == 1)
                            {{ Form::radio('star_rating', $ratings[$i], true, ['id' => 'star' . $ratings[$i], 'class' => 'mask mask-star-2 bg-yellow-400 mr-1']) }}
                        @else
                            {{ Form::radio('star_rating', $ratings[$i], false, ['id' => 'star' . $ratings[$i], 'class' => 'mask mask-star-2 bg-yellow-400 mr-1']) }}
                        @endif
                        <label for="star{{ $ratings[$i] }}"></label>
                    @endfor
                </div>
            </div>
            <div class="flex items-center justify-between">
                {{Form::submit('Submit', ['class'=>'bg-primary text-white font-bold py-2 px-4 rounded'])}}
                {!! Form::close() !!}
                <a href="/dashboard" class="btn btn-primary text-white">Cancel</a>
            </div>
        </div>
    </div>
@endsection
