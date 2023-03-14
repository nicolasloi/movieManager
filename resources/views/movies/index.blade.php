@extends('layouts.app')

@section('content')
    <h1>Movies</h1>
    <div class="flex flex-col items-center h-screen bg-secondary">
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
                @if(count($movies) > 1)
                    @foreach($movies as $movie)
                        <tr>
                            <th>
                                <label>
                                    <a href="/movies/{{$movie->id}}">
                                        <input type="button" class="checkbox" />
                                    </a>
                                </label>
                            </th>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="" alt="image of the film"/>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">{{$movie->title}}</div>
                                        <div class="text-sm opacity-50">{{$movie->created_at}}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{$movie->body}}
                            </td>
                            <td>
                                <div class="rating">
                                    <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
                                    <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" checked />
                                    <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
                                    <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
                                    <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
                                </div>
                            </td>
                            <th>
                                <button class="btn btn-ghost btn-xs">Edit</button>
                                <br>
                                <button class="btn btn-ghost btn-xs">Delete</button>
                            </th>
                        </tr>
                    @endforeach

                </tbody>
                <!-- foot -->
                <tfoot>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Score</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
        @else
            <p>No movies found</p>
        @endif
    </div>
@endsection


