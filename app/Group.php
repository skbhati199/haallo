<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table="groups";
    public function getimageAttribute($image)
    {
                return url('public/uploads/images').'/'.$image;
    }
}
