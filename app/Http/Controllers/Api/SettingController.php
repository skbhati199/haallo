<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Support;
use App\UserRateing;


class SettingController extends Controller
{
    public function Support(Request $req){

    	 $support = new Support;
    	 $support->user_id=$req->user_id;
    	 $support->report=$req->report;
    	 $support->save();

    	 return response()->json(['data'=>'Data Successfully Save']);
    }

    public function Rateing(Request $req){
    	$rateing = new UserRateing;
    	$rateing->user_id=$req->user_id;
    	$rateing->rateing_id=$req->sender_id;
    	$rateing->rateing=$req->rateing;
    	$rateing->description=$req->description;
    	$rateing->save();

    	return response()->json(['data'=>'Rateing Successfully Save']);
    }
}
