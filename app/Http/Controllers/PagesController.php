<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display the application's homepage.
     */
    public function index()
    {
        return view('pages.index');
    }
}
