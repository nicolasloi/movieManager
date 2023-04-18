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
        $trendingResponse = Http::get('https://api.themoviedb.org/3/trending/movie/week', [
            'api_key' => env('TMDB_API_KEY'),
        ]);

        // Send a GET request to The Movie Database API to retrieve top rated movies
        $topRatedResponse = Http::get('https://api.themoviedb.org/3/tv/top_rated', [
            'api_key' => env('TMDB_API_KEY'),
            'region' => 'US',
        ]);

        // If the responses are successful, extract the lists of movies and TV shows
        if ($trendingResponse->ok() && $topRatedResponse->ok()) {
            $trending_movies = $trendingResponse->json()['results'];
            $top_rated_movies = $topRatedResponse->json()['results'];
        } else {
            // If any of the responses is not successful, display an error message
            $error = $trendingResponse->json()['status_message'] ?? $topRatedResponse->json()['status_message'];
            return view('inc.messages', compact('error'));
        }

        // Render the homepage view, passing in the lists of trending movies and top rated movies
        return view('pages.index', compact('trending_movies', 'top_rated_movies'));
    }
}

