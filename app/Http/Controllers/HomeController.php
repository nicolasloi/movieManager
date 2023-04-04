<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use function PHPUnit\Framework\stringEndsWith;

class HomeController extends Controller
{
    public function index()
    {

        $response = Http::get('https://api.themoviedb.org/3/trending/movie/week', [
            'api_key' => env('TMDB_API_KEY'),
        ]);


        if ($response->ok()) {

            $trending_movies = $response->json()['results'];
        } else {

            $error = $response->json()['status_message'];
            return view('inc.messages', compact('error'));
        }

        return view('pages.index', compact('trending_movies'));
    }
}

