<?php

namespace DCStore;

use DCStore\RequirementsGame;
use Illuminate\Database\Eloquent\Model;

class OS extends Model
{
    protected $table='os';
    public $timestamps=false;

    public function requirementsGame()
    {
    	return $this->hasMany(RequirementsGame::class,'quality');
    }
}
