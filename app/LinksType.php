<?php

namespace DCStore;

use DCStore\Links;
use Illuminate\Database\Eloquent\Model;

class LinksType extends Model
{
    protected $table='links_type';
    public $timestamps=false;

    public function links()
    {
    	return $this->hasMany(Links::class,'type');
    }
}
