<?php

namespace DCStore;

use DCStore\Article;
use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
    protected $table='article_type';
    public $timestamps=false;
    public function articles()
    {
    	return $this->hasMany(Article::class,'quality');
    }
}
