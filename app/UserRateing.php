<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserRateing extends Model
{
    protected $table='user_rateing';

    public function getUserName(){
    	return $this->belongsTo(User::class,'user_id','id');
    }
}
