<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Friend;

class FriendController extends Controller
{
    public function friendMgmt(){
    	 $user=User::orderBy('id','desc')->get();
    	 return view('admin.friend-mgmt',compact('user'));
    }

    public function setLimit(Request $req,$id){
        if($req->method()=="GET"){
            $data=User::where('id',$id)->first();
            return response()->json(['data'=>$data]);
        }else{
        	User::where('id',$req->user_id)->update(['set_limit'=>$req->setlimit]);
        	return back()->with('msg','Success');
        }
    }

    public function friendList($id){
    	$text='';
    	$friend=Friend::where('user_id',$id)->get();
    	foreach ($friend as $key => $value) {
    	   $user[]=User::where('id',$value->friend_id)->first();
    	}
    	$count=count($user);
    	if($count>0){
    		foreach ($user as $key => $value) {
    			$text='<tr>
              			<td>'.++$key.'</td>	
              			<td>'.@$value->user_name.'</td>	
              			<td>'.@$value->created_at->format('d/m/Y').'</td>
          			   </tr>';
	    	}
    	}else{

    	}

    	return response()->json(['text'=>$text]);
	    	
    }
}
