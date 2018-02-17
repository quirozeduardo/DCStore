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

class ShowArticleController extends Controller
{
    private $genders;
	private $qualitys;
    private $resultSlider;
    private $sliderView;
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
        	'contentAsideLastAdd' => $this->lastAdd,
            'contentAsideLastUpdated' => $this->lastAdd,
            'sliderView' => $this->sliderView,
            'contentSection' => $templateArticle,
            'genders' => $this->genders,
            'qualitys' => $this->qualitys,
        ]);
    }
}
