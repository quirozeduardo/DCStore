<?php

namespace DCStore;

use DCStore\InformationGame;
use Illuminate\Database\Eloquent\Model;

class FormatGame extends Model
{
    protected $table='format_game';
    public $timestamps=false;

    public function informationsGame()
    {
    	return $this->hasMany(InformationGame::class,'id');
    }

}
