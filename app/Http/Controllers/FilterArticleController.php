<?php

namespace DCStore\Http\Controllers;

use DCStore\Gender;
use DCStore\Quality;
use DCStore\Article;
use Illuminate\Http\Request;

class FilterArticleController extends Controller
{
    private $genders;
	private $qualitys;
    private $resultSlider;
    private $sliderView;
    private $lastAdd;
	public function __construct()
    {
    	$dataLastAdd=Article::select('datasheet.another_title as title','article.id')
            ->join('datasheet','datasheet.id','=','article.id')
            ->where('article.type',1)
            ->orderBy('updated_at','desc')
            ->take(10)
            ->get();
        $this->lastAdd=view('templates.partials.last_add',[
            'articles' => $dataLastAdd,
        ]);
        $this->resultSlider=Article::where('type',1)->orderBy('updated_at','desc')->take(10)->get();
        $this->sliderView=view('templates.partials.slider',[
            'articles' => $this->resultSlider,
        ]);


    	$this->genders=Gender::all();
    	$this->qualitys=Quality::all();
    }
    public function moviesGender($gender='')
    {
        $nShow=50;
        
        if($gender!=''){          
            $result=Article::select('article.id','article.updated_at','article.image','datasheet.another_title as title')
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
    		'contentAsideLastAdd' => $this->lastAdd,
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
            $result=Article::select('article.id','article.updated_at','article.image','datasheet.another_title as title')
            ->join('information','information.id','=','article.id')
            ->join('datasheet','datasheet.id','=','information.id')
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
        	'contentAsideLastAdd' => $this->lastAdd,
            'sliderView' => $this->sliderView,
            'contentSection' => $moviesView,
            'genders' => $this->genders,
            'qualitys' => $this->qualitys,
        ]);
    }
}
