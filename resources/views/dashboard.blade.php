@extends('layouts.app')

@section('content')
    <div class="h-screen bg-secondary">
        <div class="flex items-center">
            <h1 class="ml-11 text-xl">Dashboard</h1>
            <div class="ml-auto mr-11">
                <a href="/movies/create"><button class="btn btn-primary text-white">Create new</button></a>
            </div>
        </div>

        <div class="flex flex-col items-center h-screen bg-secondary mt-12">
            <div class="overflow-x-auto mx-auto max-w-screen-2xl w-full">
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th>show</th>
                        <th class="flex gap-14 justify-center items-center">
                            <form action="" method="get">
                                @if(request()->get('sort') === '-title')
                                    <button class="flex gap-3" type="submit" name="sort" value="title">NAME <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M2.24 6.8a.75.75 0 001.06-.04l1.95-2.1v8.59a.75.75 0 001.5 0V4.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0L2.2 5.74a.75.75 0 00.04 1.06zm8 6.4a.75.75 0 00-.04 1.06l3.25 3.5a.75.75 0 001.1 0l3.25-3.5a.75.75 0 10-1.1-1.02l-1.95 2.1V6.75a.75.75 0 00-1.5 0v8.59l-1.95-2.1a.75.75 0 00-1.06-.04z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @else
                                    <button class="flex gap-3" type="submit" name="sort" value="-title">NAME <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M2.24 6.8a.75.75 0 001.06-.04l1.95-2.1v8.59a.75.75 0 001.5 0V4.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0L2.2 5.74a.75.75 0 00.04 1.06zm8 6.4a.75.75 0 00-.04 1.06l3.25 3.5a.75.75 0 001.1 0l3.25-3.5a.75.75 0 10-1.1-1.02l-1.95 2.1V6.75a.75.75 0 00-1.5 0v8.59l-1.95-2.1a.75.75 0 00-1.06-.04z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @endif
                            </form>

                            <form method="GET">
                                <div class="flex items-center">
                                    <label for="search" class="mr-2">Search:</label>
                                    <input type="text" id="search" name="search" value="{{ request('search') }}" class="px-2 py-1 border rounded">
                                    <button type="submit" class="btn btn-primary ml-2">Search</button>
                                </div>
                            </form>

                        </th>
                        <th>Content</th>
                        <th>
                            <form action="" method="get">
                                @if(request()->get('sort') === '-star_rating')
                                    <button class="flex gap-3" type="submit" name="sort" value="star_rating">SCORE <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M2.24 6.8a.75.75 0 001.06-.04l1.95-2.1v8.59a.75.75 0 001.5 0V4.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0L2.2 5.74a.75.75 0 00.04 1.06zm8 6.4a.75.75 0 00-.04 1.06l3.25 3.5a.75.75 0 001.1 0l3.25-3.5a.75.75 0 10-1.1-1.02l-1.95 2.1V6.75a.75.75 0 00-1.5 0v8.59l-1.95-2.1a.75.75 0 00-1.06-.04z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @else
                                    <button class="flex gap-3" type="submit" name="sort" value="-star_rating">SCORE <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M2.24 6.8a.75.75 0 001.06-.04l1.95-2.1v8.59a.75.75 0 001.5 0V4.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0L2.2 5.74a.75.75 0 00.04 1.06zm8 6.4a.75.75 0 00-.04 1.06l3.25 3.5a.75.75 0 001.1 0l3.25-3.5a.75.75 0 10-1.1-1.02l-1.95 2.1V6.75a.75.75 0 00-1.5 0v8.59l-1.95-2.1a.75.75 0 00-1.06-.04z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @endif
                            </form>
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($movies) > 0)
                        @foreach($movies as $movie)
                            <tr>
                                <th>
                                    <label class="text-gray-400 hover:text-gray-500">
                                        <a href="/movies/{{$movie->id}}">
                                            <svg class="w-5 h-5 text-primary" aria-hidden="true" fill="none"
                                                 stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                    </label>
                                </th>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle w-24 h-24">
                                                <img class="w-full" src="/storage/cover_images/{{$movie->cover_image}}"
                                                     alt="img"/>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{$movie->title}}</div>
                                            <div class="text-sm opacity-50">{{ \Carbon\Carbon::parse($movie->created_at)->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="max-w-xs min-w-xs whitespace-pre-line">
                                    {!! limit_text($movie->body, 35) !!}
                                </td>

                                <td>
                                    {!! (new \App\Http\Controllers\MovieController())->ratingToStars($movie->star_rating) !!}
                                </td>

                                <th class="max-w-min">
                                    <div class="flex justify-center gap-5">
                                        <a href="/movies/{{$movie->id}}/edit"
                                           class="btn btn-primary py-2 text-white btn-sm">Edit</a>
                                        {!! Form::open(['route' => ['movies.destroy', $movie->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure you want to remove this movie ?")']) !!}
                                        {!!Form::hidden('_method','DELETE')!!}
                                        {{ Form::submit('DELETE', ['class'=>'btn btn-error py-2 text-white btn-sm']) }}
                                        {!! Form::close() !!}
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-5">
                    {{ $movies->appends($_GET)->links() }}
                </div>
            </div>
            @else
                <p class="text-3xl p-12">No movies found</p>
            @endif
        </div>
    </div>
    @php
        function limit_text($text, $limit) {
            if (strlen($text) > $limit) {
            $text = substr($text, 0, $limit-3) . '...';
            }
            return $text;
        }
    @endphp
@endsection
