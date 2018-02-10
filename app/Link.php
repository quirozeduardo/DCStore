<?php

namespace DCStore;

use DCStore\Links;
use DCStore\Server;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table='link';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps=false;

    public function links()
    {
    	return $this->belongsTo(Links::class,'quality');
    }
    public function server()
    {
    	return $this->belongsTo(Server::class,'quality');
    }
}
