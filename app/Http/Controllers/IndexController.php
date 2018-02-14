<?php

namespace DCStore\Http\Controllers;


use DCStore\Gender;
use DCStore\Quality;
use DCStore\Article;
use DCStore\Datasheet;
use DCStore\Information;
use DCStore\format;
use DCStore\lenguage;
use DCStore\subtitles;
use DCStore\Country;
use DCStore\Photo;

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
        $article=Article::where('id', $id)->get()->first();
        $information=Information::where('id', $id)->get()->first();

        $quality=Quality::where('id', $information->quality)->get()->first();
        $format=Format::where('id', $information->format)->get()->first();
        $lenguage=Lenguage::where('id', $information->lenguage)->get()->first();
        $subtitles=Subtitles::where('id', $information->subtitles)->get()->first();

        $country=Country::where('id', $datasheet->country)->get()->first();

        $gendersTmp=Gender::select('gender.gender')
            ->join('genders','genders.gender','=','gender.id')
            ->where('genders.id',$id)
            ->get();
        $genders=array();
        foreach ($gendersTmp as $var) {
            $genders[]=$var->gender;
        }


        $photosTmp=Photo::where('id',$id)->get();
        $photos=array();
        foreach ($photosTmp as $var) {
            $photos[]=$var->photo;
        }
        
       
        
        $movie=view('show_movie',[
            'quality' => $quality->quality,
            'format' => $format->format,
            'resolution' => $information->resolution_w."x".$information->resolution_h,
            'size' => $information->size,
            'lenguage' => $lenguage->lenguage,
            'subtitles' => $subtitles->subtitles,

            'original_title' => $datasheet->original_title,
            'another_title' => $datasheet->another_title,
            'year' => $datasheet->year,
            'duration' => $datasheet->duration,
            'country' => $country->country,
            'directed' => $datasheet->directed,
            'screenplay' => $datasheet->screenplay,
            'music' => $datasheet->music,
            'cinematography' => $datasheet->cinematography,
            'starring' => $datasheet->starring,
            'production_company' => $datasheet->production_company,
            'genders' => $genders,
        ]);
        $templateArticle=view('templates.article_view',[
            'contentSection' => $movie,
            'title' => $datasheet->another_title,
            'image' => $article->image,
            'photos' => $photos
        ]);
        return view('app',[
            'sliderView' => $this->sliderView,
            'contentSection' => $templateArticle,
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
