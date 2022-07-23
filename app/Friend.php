<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Friend extends Model
{
    protected $table ="friends";

    public function getUser(){
    	return $this->belongsTo(User::class,'friend_id','id');
    }
}
