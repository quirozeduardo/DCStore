<?php

namespace DCStore;

use DCStore\Gender;
use Illuminate\Database\Eloquent\Model;

class Genders extends Model
{
    protected $table='genders';
    public $timestamps=false;

    public function gender()
    {
    	return $this->belongsTo(Gender::class,'id');
    }
}
