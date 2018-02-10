<?php

namespace DCStore;

use Illuminate\Database\Eloquent\Model;

class FeatureSoftware extends Model
{
    protected $table='feature_software';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps=false;
}
