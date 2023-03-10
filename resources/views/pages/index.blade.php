@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <h1 class="text-3xl font-bold underline bg-red-500">
        Hello world!
    </h1>

    <button class="btn">Button</button>
    <button class="btn btn-primary">Button</button>
    <button class="btn btn-secondary">Button</button>
    <button class="btn btn-accent">Button</button>
    <button class="btn btn-ghost">Button</button>
    <button class="btn btn-link">Button</button>
@endsection
