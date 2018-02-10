<?php

namespace DCStore;

use DCStore\FormatGame;
use DCStore\PlataformGame;
use DCStore\GenderGame;
use Illuminate\Database\Eloquent\Model;

class InformationGame extends Model
{
    protected $table='information_game';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps=false;
    
    public function formatGame()
    {
    	return $this->belongsTo(FormatGame::class,'id');
    }
    public function plataformGame()
    {
    	return $this->belongsTo(PlataformGame::class,'id');
    }
    public function genderGame()
    {
    	return $this->belongsTo(GenderGame::class,'id');
    }

}
