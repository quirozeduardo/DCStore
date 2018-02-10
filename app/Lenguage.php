<?php

namespace DCStore;

use Illuminate\Database\Eloquent\Model;

class Lenguage extends Model
{
    protected $table='lenguage';
    public $timestamps=false;

    public function informations()
    {
    	return $this->hasMany(Information::class,'lenguage');
    }
}
