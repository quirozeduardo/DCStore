<?php

namespace DCStore;

use DCStore\Link;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $table='server';
    public $timestamps=false;

    public function links()
    {
    	return $this->hasMany(Link::class,'server');
    }
}
