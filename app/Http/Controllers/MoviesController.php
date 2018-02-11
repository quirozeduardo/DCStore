<?php

namespace DCStore\Http\Controllers;

use DCStore\Article;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function loadMovies()
    {
    	$nShow=10;
    	$result=Article::where('type',3)->orderBy('updated_at','desc')->get();
    	$count=$result->count();
    	$articles=$result->take($nShow);
		$ndots=($count/$nShow);
		if(($count%$nShow)!=0)
			$ndots++;
		$ndots=floor($ndots);
    	//dd($articles->count());
    	return view('movies',compact('articles','ndots'));
    }
}
