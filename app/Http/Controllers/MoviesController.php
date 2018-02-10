<?php

namespace DCStore\Http\Controllers;

use DCStore\Article;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function loadMovies()
    {
    	$articles=Article::where('type',3)->get();
    	//dd($articles->count());
    	return view('movies',compact('articles'));
    }
}
