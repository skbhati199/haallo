<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\AdminNotification;


class NotificationController extends Controller
{
    public function NotificationMgmt(){
    	$user=User::get();
    	$notification=AdminNotification::orderBy('id','desc')->get();
    	return view('admin.notification-mgmt',compact('user','notification'));
    }

    public function AddNotification(Request $req){
    	 $obj = new AdminNotification();
            $obj->sender_id = $req->sender_id;
            $obj->receiver_id = $req->receiver_id;
            $obj->title = $req->title;
            $obj->description = $req->description;
            if ($obj->save()) {
                return response()->json(['status' => 'success']);
            }
    }

    public function DeleteNotification($id){
    	AdminNotification::where('id',$id)->delete();
    	return back();
    }
}
