<?php

namespace DCStore;

use DCStore\Information;
use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    protected $table='quality';
    public $timestamps=false;

    public function informations()
    {
    	return $this->hasMany(Information::class,'quality');
    }
}
