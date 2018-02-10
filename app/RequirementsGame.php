<?php

namespace DCStore;

use DCStore\OS;
use Illuminate\Database\Eloquent\Model;

class RequirementsGame extends Model
{
    protected $table='requirements_game';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps=false;

    public function genderGame()
    {
    	return $this->belongsTo(OS::class,'id');
    }
}
