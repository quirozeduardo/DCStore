<?php

namespace DCStore\Http\Controllers;


use DCStore\Gender;
use DCStore\Quality;
use DCStore\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	private $genders;
	private $qualitys;
	public function __construct()
    {
    	$this->genders=Gender::all();
    	$this->qualitys=Quality::all();
    }
    public function loadAll()
    {
    	$resultMovies=Article::where('type',1)->orderBy('updated_at','desc')->take(10)->get();
    	$resultSeries=Article::where('type',2)->orderBy('updated_at','desc')->take(10)->get();
    	$resultGames=Article::where('type',3)->orderBy('updated_at','desc')->take(10)->get();
    	$resultSoftware=Article::where('type',4)->orderBy('updated_at','desc')->take(10)->get();



    	return "";
    }
    public function index()
    {
    	$resultMovies=Article::where('type',1)->orderBy('updated_at','desc')->take(10)->get();
    	$resultSeries=Article::where('type',2)->orderBy('updated_at','desc')->take(10)->get();
    	$resultGames=Article::where('type',3)->orderBy('updated_at','desc')->take(10)->get();
    	$resultSoftware=Article::where('type',4)->orderBy('updated_at','desc')->take(10)->get();

    	$indexView=view('index',[
    		'movies' => $resultMovies,
    		'series' => $resultSeries,
    		'games' => $resultGames,
    		'softwares' => $resultSoftware, 
    	]);

    	return view('app',[
    		'contentSection' => $indexView,
    		'genders' => $this->genders,
    		'qualitys' => $this->qualitys,
    	]);
    }

    public function movies()
    {
    	$nShow=50;
    	$result=Article::where('type',1)->orderBy('updated_at','desc')->get();
    	$count=$result->count();
    	$articles=$result->take($nShow);
		$npages=($count/$nShow);
		if(($count%$nShow)!=0)
			$npages++;
		$npages=floor($npages);
    	//dd($articles->count());
    	$moviesView= view(
    		'movies',[
    		'articles' => $articles,
    		'npages' => $npages,
    	]);

    	return view('app',[
    		'contentSection' => $moviesView,
    		'genders' => $this->genders,
    		'qualitys' => $this->qualitys,
    	]);
    }
    public function series()
    {
    	$nShow=50;
    	$result=Article::where('type',2)->orderBy('updated_at','desc')->get();
    	$count=$result->count();
    	$articles=$result->take($nShow);
		$npages=($count/$nShow);
		if(($count%$nShow)!=0)
			$npages++;
		$npages=floor($npages);
    	//dd($articles->count());
    	$moviesView= view(
    		'series',[
    		'articles' => $articles,
    		'npages' => $npages,
    	]);

    	return view('app',[
    		'contentSection' => $moviesView,
    		'genders' => $this->genders,
    		'qualitys' => $this->qualitys,
    	]);
    }
    public function games()
    {
    	$nShow=50;
    	$result=Article::where('type',3)->orderBy('updated_at','desc')->get();
    	$count=$result->count();
    	$articles=$result->take($nShow);
		$npages=($count/$nShow);
		if(($count%$nShow)!=0)
			$npages++;
		$npages=floor($npages);
    	//dd($articles->count());
    	$moviesView= view('games',[
    		'articles' => $articles,
    		'npages' => $npages,
    	]);

    	return view('app',[
    		'contentSection' => $moviesView,
    		'genders' => $this->genders,
    		'qualitys' => $this->qualitys,
    	]);
    }
    public function softwares()
    {
    	$nShow=50;
    	$result=Article::where('type',4)->orderBy('updated_at','desc')->get();
    	$count=$result->count();
    	$articles=$result->take($nShow);
		$npages=($count/$nShow);
		if(($count%$nShow)!=0)
			$npages++;
		$npages=floor($npages);
    	//dd($articles->count());
    	$moviesView= view(
    		'softwares',[
    		'articles' => $articles,
    		'npages' => $npages,
    	]);

    	return view('app',[
    		'contentSection' => $moviesView,
    		'genders' => $this->genders,
    		'qualitys' => $this->qualitys,
    	]);
    }
}
