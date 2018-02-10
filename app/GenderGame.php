<?php

namespace DCStore;

use DCStore\InformationGame;
use Illuminate\Database\Eloquent\Model;

class GenderGame extends Model
{
    protected $table='gender_game';
    public $timestamps=false;
    public function informationsGame()
    {
    	return $this->hasMany(InformationGame::class,'id');
    }
}
