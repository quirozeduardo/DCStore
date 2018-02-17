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
    private $resultSlider;
    private $sliderView;
    private $lastAdd;
    private $lastUpdated;
	public function __construct()
    {
        $dataLastAdd=Article::select('datasheet.another_title as title','article.id')
            ->join('datasheet','datasheet.id','=','article.id')
            ->where('article.type',1)
            ->orderBy('created_at','desc')
            ->take(10)
            ->get();
        $this->lastAdd=view('templates.partials.last_add',[
            'articles' => $dataLastAdd,
        ]);
        $dataLastAddUpdated=Article::select('datasheet.another_title as title','article.id')
            ->join('datasheet','datasheet.id','=','article.id')
            ->where('article.type',1)
            ->orderBy('updated_at','desc')
            ->take(10)
            ->get();
        $this->lastUpdated=view('templates.partials.last_updated',[
            'articles' => $dataLastAddUpdated,
        ]);
        $this->resultSlider=Article::select('datasheet.another_title as title','article.id','article.image')
            ->join('datasheet','datasheet.id','=','article.id')
            ->where('article.type',1)
            ->orderBy('created_at','desc')
            ->take(10)
            ->get();
        $this->sliderView=view('templates.partials.slider',[
            'articles' => $this->resultSlider,
        ]);


    	$this->genders=Gender::all();
    	$this->qualitys=Quality::all();
    }
    public function index()
    {
        

    	$resultMovies=Article::select('datasheet.another_title as title','article.id','article.image')
            ->join('datasheet','datasheet.id','=','article.id')
            ->where('article.type',1)
            ->orderBy('created_at','desc')
            ->take(10)
            ->get();
    	$resultSeries=Article::select('datasheet.another_title as title','article.id','article.image')
            ->join('datasheet','datasheet.id','=','article.id')
            ->where('article.type',2)
            ->orderBy('created_at','desc')
            ->take(10)
            ->get();
    	$resultGames=Article::select('information_game.title as title','article.id','article.image')
            ->join('information_game','information_game.id','=','article.id')
            ->where('article.type',3)
            ->orderBy('created_at','desc')
            ->take(10)
            ->get();
    	$resultSoftware=Article::select('information_software.title as title','article.id','article.image')
            ->join('information_software','information_software.id','=','article.id')
            ->where('article.type',4)
            ->orderBy('created_at','desc')
            ->take(10)
            ->get();

        

    	$indexView=view('index',[            
    		'movies' => $resultMovies,
    		'series' => $resultSeries,
    		'games' => $resultGames,
    		'softwares' => $resultSoftware, 
    	]);

    	return view('app',[
            'contentAsideLastAdd' => $this->lastAdd,
            'contentAsideLastUpdated' => $this->lastAdd,
            'sliderView' => $this->sliderView,
    		'contentSection' => $indexView,
    		'genders' => $this->genders,
    		'qualitys' => $this->qualitys,
    	]);
    }
    public function movies()
    {
        $nShow=50;
        
        $result=Article::select('datasheet.another_title as title','article.id','article.image')
            ->join('datasheet','datasheet.id','=','article.id')
            ->where('article.type',1)
            ->orderBy('created_at','desc')
            ->get();
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
            'contentAsideLastAdd' => $this->lastAdd,
            'contentAsideLastUpdated' => $this->lastAdd,
            'sliderView' => $this->sliderView,
            'contentSection' => $moviesView,
            'genders' => $this->genders,
            'qualitys' => $this->qualitys,
        ]);
    }

    
    
    public function series()
    {
    	$nShow=50;
    	$result=Article::select('datasheet.another_title as title','article.id','article.image')
            ->join('datasheet','datasheet.id','=','article.id')
            ->where('article.type',2)
            ->orderBy('created_at','desc')
            ->get();
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
            'contentAsideLastAdd' => $this->lastAdd,
            'contentAsideLastUpdated' => $this->lastAdd,
            'sliderView' => $this->sliderView,
    		'contentSection' => $moviesView,
    		'genders' => $this->genders,
    		'qualitys' => $this->qualitys,
    	]);
    }
    public function games()
    {
    	$nShow=50;
    	$result=Article::select('datasheet.another_title as title','article.id','article.image')
            ->join('datasheet','datasheet.id','=','article.id')
            ->where('article.type',3)
            ->orderBy('created_at','desc')
            ->get();
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
            'contentAsideLastAdd' => $this->lastAdd,
            'contentAsideLastUpdated' => $this->lastAdd,
            'sliderView' => $this->sliderView,
    		'contentSection' => $moviesView,
    		'genders' => $this->genders,
    		'qualitys' => $this->qualitys,
    	]);
    }
    public function softwares()
    {
    	$nShow=50;
    	$result=Article::select('datasheet.another_title as title','article.id','article.image')
            ->join('datasheet','datasheet.id','=','article.id')
            ->where('article.type',4)
            ->orderBy('created_at','desc')
            ->get();
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
            'contentAsideLastAdd' => $this->lastAdd,
            'contentAsideLastUpdated' => $this->lastAdd,
            'sliderView' => $this->sliderView,
    		'contentSection' => $moviesView,
    		'genders' => $this->genders,
    		'qualitys' => $this->qualitys,
    	]);
    }
}
