@extends('layouts.app')

@section('content')
    <h1>Create Movie</h1>

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
    {{Form::submit('Submit', ['class'=>'btn btn-primary text-white'])}}
    {!! Form::close() !!}
@endsection


