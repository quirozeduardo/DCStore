<?php

namespace DCStore;

use Illuminate\Database\Eloquent\Model;

class Subtitles extends Model
{
    protected $table='subtitles';
    public $timestamps=false;

    public function informations()
    {
    	return $this->hasMany(Information::class,'subtitles');
    }
}
