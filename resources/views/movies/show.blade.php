@extends('layouts.app')

@section('content')
    <div class="h-screen bg-secondary">
        <a href="/dashboard" class="ml-8 btn btn-primary text-white">Go Back</a>

        <div class="flex flex-col h-screen bg-secondary mt-12">
            <div class="flex justify-center">
                <div class="w-full max-w-screen-2xl">
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md">
                        <div class="px-6 py-4 mb-5 bg-primary text-white border-b">
                            <h2 class="font-bold justify-center flex">{{ $movie->title }}</h2>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="left flex flex-col">
                                <div class="flex justify-between items-start m-4">
                                    <div class="mt-2 ml-4">
                                        <p class="block text-gray-700 font-bold mb-2">Rating</p>
                                        {!! (new \App\Http\Controllers\MovieController())->ratingToStars($movie->star_rating) !!}
                                    </div>
                                    <p class="text-gray-600">
                                        Seen {{ \Carbon\Carbon::parse($movie->created_at)->diffForHumans() }}</p>
                                </div>
                                <div class="flex-grow m-9">
                                    <p class="block text-gray-700 font-bold mb-2 text-xl mb-3">Content : </p>
                                    {!!$movie->body!!}
                                </div>
                            </div>
                            <div class="right">
                                @if($movie->cover_image == 'noImage.jpg')
                                @else
                                    <div class="w-auto max-w-xll rounded-lg border-solid border-2 border-primary m-5">
                                        <img class="w-auto"
                                             src="/storage/cover_images/{{$movie->cover_image}}" alt="img"/>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if(!Auth::guest())
                            <div class="flex justify-center my-4 gap-5">
                                @if(Auth::user()->id == $movie->user_id)
                                    <a href="/movies/{{$movie->id}}/edit"
                                       class="btn bg-primary text-white font-bold py-2 px-4 rounded">Edit</a>
                                    {!! Form::open(['route' => ['movies.destroy', $movie->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure you want to remove this movie ?")']) !!}
                                    {!!Form::hidden('_method','DELETE')!!}
                                    {{ Form::submit('Delete', ['class'=>'btn btn-error text-white font-bold py-2 px-4 rounded']) }}
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
