<?php

namespace DCStore\Http\Controllers;

use DCStore\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function loadAll()
    {
    	$result=Article::where('type',3)->orderBy('updated_at','desc')->get();

    	return view('main',['movies' => $result]);
    }
}