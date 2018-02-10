<?php

namespace DCStore;

use Illuminate\Database\Eloquent\Model;

class InformationSoftware extends Model
{
    protected $table='information_software';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps=false;
}
