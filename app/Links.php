<?php

namespace DCStore;

use DCStore\Article;
use DCStore\LinksType;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $table='links';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps=false;

    public function type()
    {
    	return $this->belongsTo(LinksType::class,'id');
    }
    public function article()
    {
    	return $this->belongsTo(Article::class,'id');
    }
}
