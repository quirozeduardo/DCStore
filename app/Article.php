<?php

namespace DCStore;

use DCStore\ArticleType;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='article';
    public $incrementing = false;
    protected $keyType = 'string';

    public function articleType()
    {
    	return $this->belongsTo(ArticleType::class,'id');
    }
}
