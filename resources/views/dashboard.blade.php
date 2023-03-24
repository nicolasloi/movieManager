@extends('layouts.app')

@section('content')
    <div class="h-screen bg-secondary">
        <div class="flex items-center">
            <h1 class="ml-11 text-xl">Dashboard</h1>
            <button class="btn btn-primary text-white ml-auto mr-11"><a href="/movies/create">Create new</a></button>
        </div>

        <div class="flex flex-col items-center h-screen bg-secondary mt-12">
            <div class="overflow-x-auto mx-auto max-w-screen-2xl w-full">
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox"/>
                            </label>
                        </th>
                        <th>
                            <form action="" method="get">
                                @if(request()->get('sort') === '-title')
                                    <button type="submit" name="sort" value="title">Name</button>
                                @else
                                    <button type="submit" name="sort" value="-title">Name</button>
                                @endif
                            </form>
                        </th>
                        <th>Content</th>
                        <th>Score</th>
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
                                            <div class="mask mask-squircle w-12 h-12">
                                                <img src="" alt="img"/>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{$movie->title}}</div>
                                            <div class="text-sm opacity-50">{{$movie->created_at}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="max-w-xs min-w-xs whitespace-pre-line">
                                    {!! limit_text($movie->body, 50) !!}
                                </td>

                                <td>
                                    <div class="rating">
                                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500"/>
                                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500"/>
                                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500"/>
                                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500"
                                               checked/>
                                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500"/>
                                    </div>
                                </td>
                                <th class="max-w-min">
                                    <div class="flex justify-center gap-5">
                                        <a href="/movies/{{$movie->id}}/edit"
                                           class="btn btn-primary py-2 text-white btn-sm">Edit</a>{!! Form::open(['route' => ['movies.destroy', $movie->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure you want to remove this movie ?")']) !!}
                                        {!!Form::hidden('_method','DELETE')!!}
                                        {{ Form::submit('Delete', ['class'=>'btn btn-error py-2 text-white btn-sm']) }}
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
