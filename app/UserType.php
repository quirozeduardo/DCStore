<?php

namespace DCStore;

use DCStore\User;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table='user_type';
    public $timestamps=false;

    public function users()
    {
    	return $this->hasMany(User::class,'id');
    }
}
