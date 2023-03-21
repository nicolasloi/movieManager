@extends('layouts.app')

@section('content')
    <div class="h-screen bg-secondary">
        <div class="flex items-center">
            <h1 class="ml-11 text-xl">Dashboard</h1>
            <button class="btn btn-primary text-white ml-auto mr-11"><a href="/movies/create">Create new</a></button>
        </div>
    </div>
@endsection
