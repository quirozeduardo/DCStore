<?php

namespace DCStore;

use DCStore\InformationGame;
use Illuminate\Database\Eloquent\Model;

class PlataformGame extends Model
{
    protected $table='plataform_game';
    public $timestamps=false;

    public function informationsGame()
    {
    	return $this->hasMany(InformationGame::class,'id');
    }
}
