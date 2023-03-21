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
                                    <label>
                                        <a href="/movies/{{$movie->id}}">
                                            <input type="button" class="checkbox"/>
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
                                    {!!$movie->body!!}
                                </td>
                                <td>
                                    <div class="rating">
                                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500"/>
                                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500"/>
                                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500"/>
                                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" checked/>
                                        <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500"/>
                                    </div>
                                </td>
                                <th class="max-w-min">
                                    <div class="flex justify-center gap-5">
                                        <a href="/movies/{{$movie->id}}/edit" class="btn btn-primary py-2 text-white btn-sm">Edit</a>{!! Form::open(['route' => ['movies.destroy', $movie->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure you want to remove this movie ?")']) !!}
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
@endsection
