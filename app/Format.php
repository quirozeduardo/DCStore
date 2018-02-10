<?php

namespace DCStore;

use DCStore\Information;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $table='format';
    public $timestamps=false;

    public function informations()
    {
    	return $this->hasMany(Information::class,'format');
    }
}
