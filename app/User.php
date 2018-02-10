<?php

namespace DCStore;

use DCStore\UserType;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    public $incrementing = false;
    protected $keyType = 'string';
    public function userType()
    {
    	return $this->belongsTo(UserType::class,'id');
    }
}
