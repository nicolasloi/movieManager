<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use function PHPUnit\Framework\stringEndsWith;

class HomeController extends Controller
{
    /**
     * Display the application's homepage, including a list of trending movies.
     */
    public function index()
    {
        // Send a GET request to The Movie Database API to retrieve trending movies for the week
        $response = Http::get('https://api.themoviedb.org/3/trending/movie/week', [
            'api_key' => env('TMDB_API_KEY'),
        ]);

        // If the response is successful, extract the list of trending movies
        if ($response->ok()) {

            $trending_movies = $response->json()['results'];
        } else {

            // If the response is not successful, display an error message
            $error = $response->json()['status_message'];
            return view('inc.messages', compact('error'));
        }

        // Render the homepage view, passing in the list of trending movies
        return view('pages.index', compact('trending_movies'));
    }
}

