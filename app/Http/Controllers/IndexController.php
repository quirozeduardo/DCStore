<?php

namespace DCStore\Http\Controllers;


use DCStore\Gender;
use DCStore\Quality;
use DCStore\Article;
use DCStore\Datasheet;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	private $genders;
	private $qualitys;
    private $resultSlider;
    private $sliderView;

	public function __construct()
    {
        $this->resultSlider=Article::where('type',1)->orderBy('updated_at','desc')->take(10)->get();
        $this->sliderView=view('templates.partials.slider',[
            'articles' => $this->resultSlider,
        ]);


    	$this->genders=Gender::all();
    	$this->qualitys=Quality::all();
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
            'sliderView' => $this->sliderView,
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
            'sliderView' => $this->sliderView,
            'contentSection' => $moviesView,
            'genders' => $this->genders,
            'qualitys' => $this->qualitys,
        ]);
    }

    public function moviesGender($gender='')
    {
        $nShow=50;
        
        if($gender!=''){          
            $result=Article::select('article.id','article.updated_at','article.image')
            ->join('information','information.id','=','article.id')
            ->join('datasheet','datasheet.id','=','information.id')
            ->join('genders','genders.id','=','datasheet.id')
            ->join('gender','gender.id','=','genders.gender')
            ->where('gender.gender',$gender)
            ->orderBy('updated_at','desc')
            ->get();
        }
        elseif(($gender!=''||$gender!='')||($gender==''||$gender==''))
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
            'sliderView' => $this->sliderView,
    		'contentSection' => $moviesView,
    		'genders' => $this->genders,
    		'qualitys' => $this->qualitys,
    	]);
    }
    public function moviesQuality($quality='')
    {
        $nShow=50;
        if($quality!=''){
            $result=Article::select('article.id','article.updated_at','article.image')
            ->join('information','information.id','=','article.id')
            ->join('quality','quality.id','=','information.quality')
            ->where('quality.quality',$quality)
            ->orderBy('updated_at','desc')
            ->get();
        }
        else
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
            'sliderView' => $this->sliderView,
            'contentSection' => $moviesView,
            'genders' => $this->genders,
            'qualitys' => $this->qualitys,
        ]);
    }
    public function movie($id='')
    {
        $datasheet=Datasheet::where('id', $id)->get()->first();
        $movie=view('show_movie',[
            'datasheet' => $datasheet
        ]);
        return view('app',[
            'sliderView' => $this->sliderView,
            'contentSection' => $movie,
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
            'sliderView' => $this->sliderView,
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
            'sliderView' => $this->sliderView,
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
            'sliderView' => $this->sliderView,
    		'contentSection' => $moviesView,
    		'genders' => $this->genders,
    		'qualitys' => $this->qualitys,
    	]);
    }
}
