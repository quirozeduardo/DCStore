<?php

namespace DCStore;

use DCStore\Datasheet;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='country';
    public $timestamps=false;

    public function informations()
    {
    	return $this->hasMany(Datasheet::class,'country');
    }
}
