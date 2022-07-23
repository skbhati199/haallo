<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    public function getcreatedAtAttribute($data){
       
        return Carbon::parse($data)
                ->toDateTimeString();
                
         
    }
    public function getimageAttribute($image)
    {
                if(isset($image)){
                    return url('public/uploads/images').'/'.$image;
                }
                else{
                    return null;
                }
                
    }
    public function getbackgroundImageAttribute($image)
    {
                if(isset($image)){
                    return url('public/uploads/images').'/'.$image;
                }
                else{
                    return null;
                }
                
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
