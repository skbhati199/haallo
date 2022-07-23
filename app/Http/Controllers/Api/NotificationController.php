<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use App\Notification;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use App\AdminNotification;

class NotificationController extends Controller
{

    public function androidPushNotification($body_text, $tokens, $notification_type,$sender_id,$result){
    	//$body_text, $tokens, $notification_type,$sender_id
    	// $body_text ="chala gaya";
    	// $notification_type="1";
    	// $sender_id= '1';
        // old :   AAAAmtBpRK0:APA91bEwqXJromr9eJIyZCt7YJn1zE1cGb2suT-B9gI8BIpO-XUZxgzjoWuNRAbYYYFzzfPFqsNh4s4EtLaY_9oBK4Q2YOMt9mRrIooCZol6qOm9tjr77mMisrWY4MrfKLrMH_exs0BZ
        $url = 'https://fcm.googleapis.com/fcm/send';       
        $headers = array (
            'Authorization: key='."AAAApbive8I:APA91bHWXgh1omucE5qJjy0_db-Msml6V86FHmYGQF4DUHzwWaA0ebvqQeXqnefgZpAs4ljscRx09rclofuJHq5WIG_-wvSRVH5Y3GMW_iG4j0BfcGoDgkY1fiX-aKzrzpUqaph21TQL",
            'Content-Type: application/json'
        );
         $tokens=array($tokens);
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        if(isset($result['user_list']))
        {
        $fields = array (
        'registration_ids' => $tokens, 
        'data' => array (
            "message" => $body_text,
            "notification_type" => $notification_type,
            "sender_id"=>$sender_id,
            'title'=>$result['title'],
            'message'       =>$result['message'],
            'send_to_id'    =>$result['send_to_id'],
            'call_id'       =>$result['call_id'],
            'full_name'     =>$result['full_name'],
            'profile_pic'   =>$result['profile_pic'],
            'user_list'     =>$result['user_list'],

            )
        );
      }
      else
      {
        $fields = array (
        'registration_ids' => $tokens, 
        'data' => array (
            "message" => $body_text,
            "notification_type" => $notification_type,
            "sender_id"=>$sender_id,
            'title'=>$result['title'],
            'message'       =>$result['message'],
            'send_to_id'    =>$result['send_to_id'],
            'call_id'       =>$result['call_id'],
            'full_name'     =>$result['full_name'],
            'profile_pic'   =>$result['profile_pic'],
            

            )
        );
      }
        //dd($fields);
        $fields = json_encode ( $fields );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch );
       //dd($result);
        if(curl_error($ch))
        {
            echo 'error:' . curl_error($ch);exit();
        }
        $json = json_decode($result, true);
        if($json['success']){
            $status=1;
        }
        curl_close ( $ch );
        if($json['success']){
            //dd("vxzncvjkbhxo");
            return 1;
        } else {
            return 0;
        }
    }
    public function iosPushNotification($body_text, $tokens, $notification_type,$sender_id,$result){ 
     //Log 
        //dd($tokens);
        $deviceToken = $tokens;
        $url = "https://fcm.googleapis.com/fcm/send";
        //Log::info('--------------------Tokens-----------'.print_r($deviceToken,true));
        $notification = array('title' =>$result['message'], 'text' => $body_text, 'sound' => 'default', 'badge' => '1');
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key=AAAApbive8I:APA91bHWXgh1omucE5qJjy0_db-Msml6V86FHmYGQF4DUHzwWaA0ebvqQeXqnefgZpAs4ljscRx09rclofuJHq5WIG_-wvSRVH5Y3GMW_iG4j0BfcGoDgkY1fiX-aKzrzpUqaph21TQL';
        $arrayToSend = array(
            'to' => $deviceToken, 
            'notification' => $notification,
            'priority'=>'high',
            'data' => array (
            "message" => $body_text,
            "notification_type" => $notification_type,
            "sender_id"=>$sender_id,
            'title'=>$result['title'],
            'message'       =>$result['message'],
            'send_to_id'    =>$result['send_to_id'],
            'call_id'       =>$result['call_id'],
            'full_name'     =>$result['full_name'],
            'profile_pic'   =>$result['profile_pic'],
            

            )
        );

        //Log::info('--------------------Tokens-----------'.print_r($arrayToSend,true));
        $json = json_encode($arrayToSend);
        //dd($json);
        //$ch = curl_init();
        $ch= curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        $response = curl_exec($ch);
        //dd($response);
        curl_close($ch);
        if ($response === false) {
            return 0;
            // die('FCM Send Error: ' . curl_error($ch));
        }else{
            return 1;
        }
    }


    public function SendNotification(Request $request){
        //dd('aaa');
        // dd($request->all());
            $title  			= $request->title;
            $description 			= $request->description;
            $users 			= $request->users;
            $validations        = [
                'title'         =>'required',
                'description'       =>'required',
                'users'=>'required',
            ];
            $validator          = Validator::make($request->all(),$validations);
            if($validator->fails()){
                $response=['message'=>$validator->errors($validator)->first()];
                return response()->json($response,400);
            }
            $notification_type = 'admin notification';
            foreach($users as $rowuser){
                $userData             = User::find($rowuser);
                //return $userData;
                $sender_id            = 'admin';
                //dd($sender_id);     
                $token                = $userData->device_token;
                
                $obj = new AdminNotification();
                $obj->sender_id = 'admin';
                $obj->receiver_id = $rowuser;
                $obj->title = $title;
                $obj->description = $description;
                $obj->save();

                $result =[
                    'title'=>$title,
                    'message'       =>$description,
                    'send_to_id'    =>$sender_id,
                    'notification_type'=>$notification_type,
                    'call_id'       =>'',
                    'full_name'     =>'',
                    'profile_pic'   =>'',
                ];
                if($userData->device_type==0){
                    $notify_0=$this->androidPushNotification($description, $token, $notification_type,$sender_id,$result);
                    // return response()->json(['message'=>'Notification successfully sent'],200);
                }
                if($userData->device_type==1){
                    $notify_1=$this->iosPushNotification($description, $token, $notification_type,$sender_id,$result);
                    //dd($notify_1);
                    // return redirect()->back()->with('success', 'Notification send successfully')
                    // return response()->json(['message'=>'Notification successfully sent'],200); 
                }else{
                    return redirect()->back()->with('success', 'Notification not sent');
                    // return response()->json(['message'=>'Notification not sent'],400);
                }                                
            }
        return redirect()->back()->with('success', 'Notification send successfully');
    }
    

    public function callingRequest(Request $request){
    //dd('aaa');
    	$send_to_id 	    = $request->send_to_id;
    	$title  			= $request->title;
    	$message 			= $request->message;
    	$notification_type  = $request->notification_type;
    	$call_id 			= $request->call_id;
        $full_name          = $request->full_name;
        $profile_pic        = $request->profile_pic;
    	$validations        = [
    		'send_to_id'    =>'required|int',
    		'title'         =>'required',
    		'message'       =>'required',
    		'notification_type'=>'required',
    		'call_id'       =>'required',
            'full_name'     =>'required',
    	];
    	$validator          = Validator::make($request->all(),$validations);
    	if($validator->fails()){
    		$response=['message'=>$validator->errors($validator)->first()];
    		return response()->json($response,400);
    	}
    	$userData             = User::find($send_to_id);
        //return $userData;
        $sender_id            = $request->user_details->id;
        //dd($sender_id);     
    	$token                = $userData->device_token;
    	$result =[
    		'title'=>$title,
    		'message'       =>$message,
    		'send_to_id'    =>$send_to_id,
    		'notification_type'=>$notification_type,
    		'call_id'       =>$call_id,
            'full_name'     =>$full_name,
            'profile_pic'   =>$profile_pic,

    	];
        if($userData->device_type==0){
            $notify_0=$this->androidPushNotification($message, $token, $notification_type,$sender_id,$result);
            return response()->json(['message'=>'Notification successfully sent'],200);
        }
        if($userData->device_type==1){
           
            $notify_1=$this->iosPushNotification($message, $token, $notification_type,$sender_id,$result);
            //dd($notify_1);
            return response()->json(['message'=>'Notification successfully sent'],200); 
        }
    	else{
    		return response()->json(['message'=>'Notification not sent'],400);
    	}
    }


    public function groupCallingRequest(Request $request){
    	$user_id           = $request->user_id;
    	$send_to_id 	    = $request->send_to_id;
    	$title  			= $request->title;
    	$message 			= $request->message;
    	$notification_type  = $request->notification_type;
    	$call_id 			= $request->call_id;
        $full_name          = $request->full_name;
        $profile_pic        = $request->profile_pic;
    	$validations        = [
    		'user_id'		=>'required',
    		'send_to_id'    =>'required',
    		'title'         =>'required',
    		'message'       =>'required',
    		'notification_type'=>'required',
    		'call_id'       =>'required',
            'full_name'     =>'required',

    	];
    	$validator          = Validator::make($request->all(),$validations);
    	if($validator->fails()){
    		$response=['message'=>$validator->errors($validator)->first()];
    		return response()->json($response,400);
    	}
    	$result =[
    		'title'=>$title,
    		'message'       =>$message,
    		'send_to_id'    =>$send_to_id,
    		'notification_type'=>$notification_type,
    		'call_id'       =>$call_id,
            'full_name'     =>$full_name,
            'profile_pic'   =>$profile_pic,
            'user_list'     =>$user_id,
    	];
    	if(sizeof($user_id)>0){
    		foreach($user_id as $key=>$value){
    			$data=User::find($value);
                $sender_id            = $request->user_details->id;
    			if(!isset($data)){
    				return response()->json(['message'=>'User ID  :'.$value."  doesn't exist."],400);
    			}
    			$token =$data->device_token;
                if($sender_id !=$value){
                    //$this->androidPushNotification($message, $token, $notification_type,$sender_id,$result);    
                    if($data->device_type==0){
                        $notify_0=$this->androidPushNotification($message, $token, $notification_type,$sender_id,$result);
                        //return response()->json(['message'=>'Notification successfully sent'],200);
                    }
                    if($data->device_type==1){
                       
                        $notify_1=$this->iosPushNotification($message, $token, $notification_type,$sender_id,$result);
                        //dd($notify_1);
                        //return response()->json(['message'=>'Notification successfully sent'],200); 
                    }
                }
    			
    		}
    		return response()->json(['message'=>'Notification successfully sent'],200);
    	}
  
    }



    public function call_single_module(Request $request){
        $send_to_id         = $request->send_to_id;
        $title              = $request->title;
        $message            = $request->message;
        $notification_type  = $request->notification_type;
        $call_id            = $request->call_id;
        $full_name          = $request->full_name;
        $profile_pic        = $request->profile_pic;
        $validations        = [
            'send_to_id'    =>'required|int',
            'title'         =>'required',
            'message'       =>'required',
            'notification_type'=>'required',
            'call_id'       =>'required',
            'full_name'     =>'required',
        ];
        $validator          = Validator::make($request->all(),$validations);
        if($validator->fails()){
            $response=['message'=>$validator->errors($validator)->first()];
            return response()->json($response,400);
        }
        $userData             = User::find($send_to_id);
        //return $userData;
        $sender_id            = $request->user_details->id;
        //dd($sender_id);     
        $token                = $userData->device_token;
        $result =[
            'title'=>$title,
            'message'       =>$message,
            'send_to_id'    =>$send_to_id,
            'notification_type'=>$notification_type,
            'call_id'       =>$call_id,
            'full_name'     =>$full_name,
            'profile_pic'   =>$profile_pic,

        ];
        if($this->androidPushNotificationCallModule($message, $token, $notification_type,$sender_id,$result)){
            return response()->json(['message'=>'Notification successfully sent'],200);
        }else{
            return response()->json(['message'=>'Notification not sent'],400);
        }
    }


    public function call_group_module(Request $request){
        $user_id           = $request->user_id;
        $send_to_id         = $request->send_to_id;
        $title              = $request->title;
        $message            = $request->message;
        $notification_type  = $request->notification_type;
        $call_id            = $request->call_id;
        $full_name          = $request->full_name;
        $profile_pic        = $request->profile_pic;
        $validations        = [
            'user_id'       =>'required',
            'send_to_id'    =>'required',
            'title'         =>'required',
            'message'       =>'required',
            'notification_type'=>'required',
            'call_id'       =>'required',
            'full_name'     =>'required',

        ];
        $validator          = Validator::make($request->all(),$validations);
        if($validator->fails()){
            $response=['message'=>$validator->errors($validator)->first()];
            return response()->json($response,400);
        }
        $result =[
            'title'=>$title,
            'message'       =>$message,
            'send_to_id'    =>$send_to_id,
            'notification_type'=>$notification_type,
            'call_id'       =>$call_id,
            'full_name'     =>$full_name,
            'profile_pic'   =>$profile_pic,
            'user_list'     =>$user_id,
        ];
        if(sizeof($user_id)>0){
            foreach($user_id as $key=>$value){
                $data=User::find($value);
                $sender_id            = $request->user_details->id;
                if(!isset($data)){
                    return response()->json(['message'=>'User ID  :'.$value."  doesn't exist."],400);
                }
                $token =$data->device_token;
                if($sender_id !=$value){
                    $this->androidPushNotificationCallModule($message, $token, $notification_type,$sender_id,$result);    
                }
                
            }
            return response()->json(['message'=>'Notification successfully sent'],200);
        }
  
    }



    public function androidPushNotificationCallModule($body_text, $tokens, $notification_type,$sender_id,$result){
        //$body_text, $tokens, $notification_type,$sender_id
        // $body_text ="chala gaya";
        // $notification_type="1";
        // $sender_id= '1';
        $url = 'https://fcm.googleapis.com/fcm/send';       
        $headers = array (
            'Authorization: key='."AAAApbive8I:APA91bHWXgh1omucE5qJjy0_db-Msml6V86FHmYGQF4DUHzwWaA0ebvqQeXqnefgZpAs4ljscRx09rclofuJHq5WIG_-wvSRVH5Y3GMW_iG4j0BfcGoDgkY1fiX-aKzrzpUqaph21TQL",
            'Content-Type: application/json'
        );
         $tokens=array($tokens);
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        if(isset($result['user_list']))
        {

        $fields = array (
        'registration_ids' => $tokens, 
        'data' => array (
            "message" => $body_text,
            "notification_type" => $notification_type,
            "sender_id"=>$sender_id,
            'title'=>$result['title'],
            'message'       =>$result['message'],
            'send_to_id'    =>$result['send_to_id'],
            'call_id'       =>$result['call_id'],
            'full_name'     =>$result['full_name'],
            'profile_pic'   =>$result['profile_pic'],
            'user_list'     =>$result['user_list'],

            )
        );
      }
      else
      {
        $fields = array (
        'registration_ids' => $tokens, 
        'data' => array (
            "message" => $body_text,
            "notification_type" => $notification_type,
            "sender_id"=>$sender_id,
            'title'=>$result['title'],
            'message'       =>$result['message'],
            'send_to_id'    =>$result['send_to_id'],
            'call_id'       =>$result['call_id'],
            'full_name'     =>$result['full_name'],
            'profile_pic'   =>$result['profile_pic'],
            

            )
        );
      }
        //dd($fields);
        $fields = json_encode ( $fields );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch );
       //dd($result);
        if(curl_error($ch))
        {
            echo 'error:' . curl_error($ch);exit();
        }
        $json = json_decode($result, true);
        if($json['success']){
            $status=1;
        }
        curl_close ( $ch );
        if($json['success']){
            //dd("vxzncvjkbhxo");
            return 1;
        } else {
            return 0;
        }
    }


    public function removeAccount(Request $request){
       // $user_id =$request->user_id;
        $user_id ='u_'.$request->user_id;
        $group_id=$request->ga03d9021b13fd3172e759cb7987c873froup_id;
        //dd($group_id);
        //dd(sizeof($group_id));
        $validations =[
            'user_id'=>'required',
           // 'group_id'=>'required',
        ];

        $validator =Validator::make($request->all(),$validations);
        if($validator->fails()){
            $response['message']= $validator->errors($validator)->first();
            return response()->json($response,400);
        }


        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/hallo-de4e5-firebase-adminsdk-x26r5-700860c423.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://hallo-de4e5-default-rtdb.firebaseio.com/')
            ->create();

        $database = $firebase->getDatabase();

        $newPost = $database
            ->getReference('blog/posts')
            ->push([
                'title' => 'Post title',
                'body' => 'This should probably be longer.'
            ]);

        $newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
        $newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-

        $newPost->getChild('title')->set('Changed post title');
        $newPost->getValue(); // Fetches the data from the realtime database
        $newPost->remove();

    //     $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/hallo-de4e5-firebase-adminsdk-x26r5-700860c423');
    //     $firebase = (new Factory)
    //         ->withServiceAccount($serviceAccount)
    //         ->create();
    //     $database = $firebase->getDatabase();
    //     $reference = $database->getReference('users')->getChild($user_id)->getChild('notificationTokens')->set("");
        
    //    $reference = $database->getReference('users')->getChild($user_id)->getChild('isUserDeleted')->set('true');
    //    $reference = $database->getReference('presence')->getChild($user_id)->set("");
    //     if($group_id!=null){
    //         foreach($group_id as $value){
    //             //dd($group_id);
    //             $reference = $database->getReference('groups')->getChild($value)->getChild('users')->getChild($user_id)->set(null);
    //         }
    //     }
        //=================this is the code to fetch data from firebase database===
         //$snapshot = $reference->getSnapshot();
        // $value = $snapshot->getValue();
        $data = User::find($request->user_id);
        if(isset($data)){
           $data->delete();
        }
        return response()->json(['message'=>'Account successfully removed'],200);
    }

    public function updateBackground(Request $request){
        $userDetails = $request->user_details;
        $image = $request->image;
        if($image) {
            $path                  =    public_path('/uploads/images');
            $profile_image_name    =    time()."_".$image->getClientOriginalName(); 
            $image->move($path."/", $profile_image_name); 
            $userDetails->background_image       =  $profile_image_name;
        }
        $userDetails->save();
        $userData = User::where('id',$userDetails->id)->first();
        $response['message'] = "Backgound image updated successfully.";
        $response['result']  =  $userData;
        return response()->json($response,200);
    }

     public function androidPushNotificationForMessage($body_text, $tokens, $notification_type,$sender_id,$result){
        //$body_text, $tokens, $notification_type,$sender_id
        // $body_text ="chala gaya";
        // $notification_type="1";
        // $sender_id= '1';
        $url = 'https://fcm.googleapis.com/fcm/send';       
        $headers = array (
            'Authorization: key='."AAAApbive8I:APA91bHWXgh1omucE5qJjy0_db-Msml6V86FHmYGQF4DUHzwWaA0ebvqQeXqnefgZpAs4ljscRx09rclofuJHq5WIG_-wvSRVH5Y3GMW_iG4j0BfcGoDgkY1fiX-aKzrzpUqaph21TQL",
            'Content-Type: application/json'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
        );
         $tokens=array($tokens);
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        if(isset($result['user_list']))
        {

        $fields = array (
        'registration_ids' => $tokens, 
        'data' => array (
            "message" => $body_text,
            "notification_type" => $notification_type,
            "sender_id"=>$sender_id,
            'message'       =>$result['message'],
            'chat_id'       =>$result['chat_id'],
            'message_id'     =>$result['message_id'],
            'friend_id'   =>$result['friend_id'],

            )
        );
      }
      else
      {
        $fields = array (
        'registration_ids' => $tokens, 
        'data' => array (
            "message" => $body_text,
            "notification_type" => $notification_type,
            "sender_id"=>$sender_id,
            'message'       =>$result['message'],
            'chat_id'       =>$result['chat_id'],
            'message_id'     =>$result['message_id'],
            'friend_id'   =>$result['friend_id'],
            

            )
        );
      }
        //dd($fields);
        $fields = json_encode ( $fields );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch );
       //dd($result);
        if(curl_error($ch))
        {
            echo 'error:' . curl_error($ch);exit();
        }
        $json = json_decode($result, true);
        if($json['success']){
            $status=1;
        }
        curl_close ( $ch );
        if($json['success']){
            //dd("vxzncvjkbhxo");
            return 1;
        } else {
            return 0;
        }
    }
    public function iosPushNotificationForMessage($body_text, $tokens, $notification_type,$sender_id,$result){ 
     //Log 
        //dd($tokens);
        $deviceToken = $tokens;
        $url = "https://fcm.googleapis.com/fcm/send";
        //Log::info('--------------------Tokens-----------'.print_r($deviceToken,true));
        $notification = array('title' =>$result['message'], 'text' => $body_text, 'sound' => 'default', 'badge' => '1');
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key=AAAAx5XVTuk:APA91bHy4rYkTyiUFGFyETxFK2vJMcVvYE4QqS63rCxJmNGxQGN4o-LQbG7qiOvFXKapitf3VbBUXJ0kdDxi1SAQFCmNs4Lf8xQjoxBkznCQYUHhgPFKt5IiF26lbQrbrWegOd0xSSLg';
        $arrayToSend = array(
            'to' => $deviceToken, 
            'notification' => $notification,
            'priority'=>'high',
            'data' => array (
            "message" => $body_text,
            "notification_type" => $notification_type,
            "sender_id"=>$sender_id,
            'message'       =>$result['message'],
            'chat_id'       =>$result['chat_id'],
            'message_id'     =>$result['message_id'],
            'friend_id'   =>$result['friend_id'],
            

            )
        );

        //Log::info('--------------------Tokens-----------'.print_r($arrayToSend,true));
        $json = json_encode($arrayToSend);
        //dd($json);
        //$ch = curl_init();
        $ch= curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        $response = curl_exec($ch);
        //dd($response);
        curl_close($ch);
        if ($response === false) {
            return 0;
            // die('FCM Send Error: ' . curl_error($ch));
        }else{
            return 1;
        }
    }

    public function sendMessage(Request $request){
        $sender_id  =   $request->user_details->id;
        $frnd_id    =   $request->friend_id;
        $message    =   $request->message;
        $message_id =   $request->message_id;
        $chat_id    =   $request->chat_id;
        $Data       =   array();
        $validations=  array(
            'friend_id'=>'required',
        );
        $validator  =   Validator::make($request->all(),$validations);
        if($validator->fails()){
            $response=['message'=>$validator->errors($validator)->first()];
            return response()->json($response,400);
        }
        $fndId  = explode(',',$frnd_id);
        if($fndId){
          foreach($fndId as $friend_id){
            $data   =User::find($friend_id);
            if(!$data){
                $response['message']="friend_id doesn't exist.";
                return response()->json($response,400);
            }
            else{
                $tokens =$data->device_token;
                $body_text= "New Message";
                $notification_type= 'send_msg_type';
                $result['chat_id']=@$chat_id;
                $result['message_id']=@$message_id;
                $result['friend_id']=@$friend_id;
                $result['message']=@$message;
            }

            if($data->device_type==0){
                $ans=    $this->androidPushNotificationForMessage($body_text, $tokens, $notification_type,$sender_id,$result);
            }
            if($data->device_type==1){
                $ans=   $this->iosPushNotificationForMessage($body_text, $tokens, $notification_type,$sender_id,$result);
            }
            if($ans){
                $data =new Notification;
                $data->sender_id = $sender_id;
                $data->friend_id = $friend_id;
                $data->save();
                $notData =Notification::where('friend_id',$friend_id)->get();
                $data['total_notification'] =count($notData);
                $Data[] =$data;
            }
          }
            $response['message'] = "Notification sent successfully.";
            $response['result']  =  $Data;
            return response()->json($response,200);
        }    
        else{
            $response['message'] = "Notification not sent.";
            return response()->json($response,400);
        }

    }
    public function fileUpload(Request $request){
        $image              =   $request->file('image');
        if($image) {
            $path                  =    public_path('/uploads/images');
            $profile_image_name    =    time()."_".$image->getClientOriginalName(); 
            $image->move($path."/", $profile_image_name); 
            $imageWithPath       =  url('public/uploads/images').'/'.$profile_image_name;
            $response['message'] = "File saved successfully.";
            $response['result']  =  $imageWithPath;
            return response()->json($response,200);
        }else{
            $response['message'] = "Please select an File.";
            return response()->json($response,400);
        }
    }
}
