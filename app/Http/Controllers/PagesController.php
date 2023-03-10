<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Welcome To MovieList';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about() {
        return view('pages.about');
    }

    public function services() {
        return view('pages.services');
    }
}
