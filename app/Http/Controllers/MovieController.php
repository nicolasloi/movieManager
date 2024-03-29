<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use PHPUnit\Metadata\PostCondition;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Storage;

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
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;

        $searchTerm = $request->input('search');
        if ($searchTerm) {
            $user = Movie::search($searchTerm)->where('user_id', $user_id)->paginate(6);
        } else {
            $user = QueryBuilder::for(Movie::class)
                ->where('user_id', $user_id)
                ->allowedSorts('title', 'star_rating')
                ->paginate(6);
        }

        return view('dashboard')->with('movies', $user);
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
        // Validate the input data
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'star_rating' => 'required'
        ]);

        // Check if the response is successful

        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filname
            $filName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $filName . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.jpg';
        }

        // Create movie
        $movie = new Movie;
        $movie->title = $request->input('title');
        $movie->body = $request->input('body');
        $movie->user_id = auth()->user()->id;
        $movie->cover_image = $fileNameToStore;
        $movie->star_rating = $request->input('star_rating');
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
        if (auth()->user()->id !== $movie->user_id) {
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
            'body' => 'required',
            'star_rating' => 'required'
        ]);

        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filname
            $filName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $filName . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        // Update movie
        $movie = Movie::find($id);
        $movie->title = $request->input('title');
        $movie->body = $request->input('body');
        if ($request->hasFile('cover_image')) {
            $movie->cover_image = $fileNameToStore;
        }
        $movie->star_rating = $request->input('star_rating');
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
        if (auth()->user()->id !== $movie->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }

        if ($movie->cover_image != 'noImage.jpg') {
            //delete image
            Storage::delete('public/cover_images/' . $movie->cover_image);
        }

        $movie->delete();
        return redirect('/dashboard')->with('success', 'Movie Removed');
    }

    /**
     * Convert a movie's star rating to HTML stars.
     *
     *      */
    public function ratingToStars($rating)
    {
        $stars = '';

        for ($i = 1; $i <= 5; $i++) {
            if ($i <= round($rating)) {
                $stars .= '<i class="text-primary-500 fas fa-star"></i>';
            } else {
                $stars .= '<i class="text-gray-400 far fa-star"></i>';
            }
        }

        return $stars;
    }
}
