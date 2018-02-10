<?php

namespace DCStore;

use DCStore\Country;
use DCStore\Information;
use Illuminate\Database\Eloquent\Model;

class Datasheet extends Model
{
    protected $table='datasheet';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps=false;

    public function country()
    {
    	return $this->belongsTo(Country::class,'id');
    }
    public function information()
    {
    	return $this->belongsTo(Information::class,'id');
    }
}
