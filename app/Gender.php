<?php

namespace DCStore;

use DCStore\Genders;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table='gender';
    public $timestamps=false;

    public function genders()
    {
    	return $this->hasMany(Genders::class,'id');
    }
}
