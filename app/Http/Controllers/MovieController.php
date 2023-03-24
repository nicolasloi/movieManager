<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use PHPUnit\Metadata\PostCondition;
use Spatie\QueryBuilder\QueryBuilder;

class MovieController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $movies = QueryBuilder::for(Movie::class)->allowedSorts('title', 'created_at')->paginate(6);
        //$movies = Movie::orderBy('title', 'asc')->get();
        //$movies = DB::select('SELECT * FROM movies');
        //$movies = Movie::orderBy('title', 'desc')->paginate(10);
        return view('movies.index')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create movie
         $movie = new Movie;
         $movie->title = $request->input('title');
         $movie->body = $request->input('body');
         $movie->user_id = auth()->user()->id;
         $movie->save();

         return redirect('/dashboard')->with('success', 'Movie Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);
        return view('movies.show')->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::find($id);

        // Check for correct user
        if (auth()->user()->id !==$movie->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }

        return view('movies.edit')->with('movie', $movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Update movie
        $movie = Movie::find($id);
        $movie->title = $request->input('title');
        $movie->body = $request->input('body');
        $movie->save();

        return redirect('/dashboard')->with('success', 'Movie Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);

        // Check for correct user
        if (auth()->user()->id !==$movie->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }

        $movie->delete();
        return redirect('/dashboard')->with('success', 'Movie Removed');
    }
}
