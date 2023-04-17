<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        // $user = \App\Models\User::find($user_id)->movies()->paginate(8);
        $user = QueryBuilder::for(Movie::class)
            ->where('user_id', $user_id)
            ->allowedSorts('title', 'star_rating')
            ->paginate(6);
        return view('dashboard')->with('movies', $user);
    }
}
