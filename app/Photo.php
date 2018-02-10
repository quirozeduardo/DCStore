<?php

namespace DCStore;

use DCStore\Article;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table='Photo';
    public $timestamps=false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function article()
    {
    	return $this->belongsTo(Article::class,'id');
    }
}
