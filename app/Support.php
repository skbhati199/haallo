<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Support extends Model
{
    protected $table='support';

    public function getUser(){
    	return $this->belongsTo(User::class,'user_id','id');
    }
}
