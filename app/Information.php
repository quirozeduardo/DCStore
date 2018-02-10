<?php

namespace DCStore;

use DCStore\Quality;
use DCStore\Format;
use DCStore\Lenguage;
use DCStore\Subtitles;
use DCStore\Datasheets;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table='information';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps=false;

    public function quality()
    {
    	return $this->belongsTo(Quality::class,'id');
    }
    public function format()
    {
    	return $this->belongsTo(Format::class,'id');
    }
    public function lenguage()
    {
    	return $this->belongsTo(Lenguage::class,'id');
    }
    public function subtitles()
    {
    	return $this->belongsTo(Subtitles::class,'id');
    }
    public function datasheet()
    {
    	return $this->belongsTo(Datasheets::class,'id');
    }
}
