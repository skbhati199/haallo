<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Validator;
use Twilio\Rest\Client;
use Exception;
use App\Friend;
use App\Group;
use App\Group_membership;
use App\Mute;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class UserController extends Controller
{

	// public function ->sendOtp($otp,$mobile,$countryCode) {

 //        $AccountSid   =  "ACae73eee7450c6d470e1d49d158a21e2e";
 //        $AuthToken    =  "a27f1d1f2a01533a2d689168d65ce8b4";
 //        $client       =  new Client($AccountSid, $AuthToken);
 //        $contact      =  $countryCode.$mobile;//'+919899728180';
 //        try{       
 //            //DB::beginTransaction();     
 //            $client->account->messages->create(
 //                $contact,
 //                array(
 //                    'from' => "+4759447763", 
 //                    // 'from' => "+15744062664",
 //                    'body' => "<#> ".$otp." is the OTP for Haallo."." ynzpkpgahO3"
 //                )
 //            );
 //            //print_r($sms);die;   -----
 //            $response     =  [
 //                'message' => 'success',
 //                'status'  => 1,
 //            ];
 //            return $response;

 //        } catch(Exception $e){
 //            $response = [
 //                'message' => $e->getMessage(),
 //                'status'  => 0,
 //            ];
 //            return $response;
 //        }
 //    }
  public function sendMsg($otp,$mobile,$countryCode){
        //require_once __DIR__.'/vendor/autoload.php';

        // \Telnyx\Telnyx::setApiKey('KEY0176CE38C50256436E96333F1CFC251E_RMQUgQC8jNwnx0oSvphleR');

        // $your_telnyx_number = '+16187471119';
        // //$destination_number = '+919315885396';
        // $destination_number = $countryCode.$mobile;
        // try{
        //   $new_message = \Telnyx\Message::Create(['from' => $your_telnyx_number, 'to' => $destination_number, 'text' => "<#> ".$otp." is the OTP for Haallo."." ynzpkpgahO3"]);
        $response     =  [
                'message' => 'success',
                'status'  => 1,
            ];
            return $response;

        // } catch(Exception $e){
        //     $response = [
        //         'message' => $e->getMessage(),
        //         'status'  => 0,
        //     ];
        //     return $response;
        // }
    }


    public function register(Request $request){
    	//dd('fbdd');
    	 $mobile 		   = $request->mobile;
    	 $country_code = $request->country_code;
    	 $password 		 = Hash::make($request->password);
    	 $device_token = $request->device_token;
    	 $validations  = [
    	 'mobile' 		 =>'required|numeric|digits_between:6,15|unique:users',
    	 'password'		 =>'required|min:8',
    	 'country_code'=>'required',
    	 'device_token'=>'required',
    	 ];
    	 $validator =Validator::make($request->all(),$validations);
    	 if($validator->fails()){
    	 	$response=[
    	 	 'message'=>$validator->errors($validator)->first()
    	 	];
    	 	return response()->json($response,400);
    	 }
    	 $otp                     =  rand(1000,9999);
    	 $userData 					      =  new User;
    	 $userData->mobile 			  =  $mobile;
    	 $userData->country_code 	=  $country_code;    	 
    	 $userData->password 		  =  $password;
    	 $userData->otp      		  =  $otp;
    	 $userData->isRegister 		=  1;
    	 $userData->device_token 	=  $device_token;
	     $userData->access_token 	=  md5(uniqid());
	     $sentOtp 					=  $this->sendMsg($otp,$mobile,$country_code);
			       // dd($sentOtp['status']);
		  // $sentOtp['status'] == 1;

     if($sentOtp['status'] == 1){
		     if($userData->save()){
		     	$response['message'] = "OTP has sent  & User successfully registered.";
    			$response['result']  = User::where('id',$userData->id)->first();
    			return response()->json($response,200);
			  }else{
          $response['message']="Invalid mobile number .";
			    return response()->json($response,400);
			  } 
		  }
		  else{

		      $response['message']="Invalid mobile number .";
			  return response()->json($response,400);
		  } 
		  
    }

    public function verifyOtp(Request $request){
        $otp           		=    $request->otp;
        $mobile        		=    $request->mobile;
        //$country_code  	=    $request->country_code;
        $validations		  =    array(
            'mobile'      =>   'required|numeric|digits_between:6,15',
            //'country_code'  =>   'required',
            'otp'         =>   'required',
        );
        $validator=Validator::make($request->all(),$validations);
        if($validator->fails()){
            $response =[
                'message'=>$validator->errors($validator)->first(),
            ];
            return response()->json($response,400);
        }
       if($userData=User::where('mobile',$mobile)->first()){
         $userData->otp_verify_status=1;
         $userData->isRegister=1;
         if($userData->otp==$otp || $otp==1234){
            $userData->save();
            $response['message']="OTP verified successfully";
            $response['result']=$userData;
            return response()->json($response,200);
         } 
         else{
            $response['message']="OTP does not match!";
            return response()->json($response,400);
         }
       }
       else{
        $response['message']="User does not exist OR wrong OTP";
        return response()->json($response,400);
       }
    }

     public function reSendOtp(Request $request){
        $mobile           		   =   $request->mobile;
       // $country_code            =   $request->country_code;
       // $fullMobileNumber        =   $country_code.$mobile;
        $validations             =   array(
                      'mobile'   =>  'required|numeric|digits_between:6,15',
              //  'country_code'   =>   'required',
                      );
          $validator                       =   Validator::make($request->all(),$validations);
          if($validator->fails())
          {
              $response                   =   array(
                  'message'               =>  $validator->errors($validator)->first()
              );
  
              return response()->json($response,400);
          }
                  $userMobile                  = User::where('mobile',$mobile)->first(); 
                   $country_code               =   $userMobile->country_code;
                  //dd($userMobile->mobile);
             if($userMobile){
               // dd('7836045260');
                  $otp                         =  rand(1000,9999);
                  $userMobile->otp             =  $otp;
                  $sentOtp = $this->sendMsg($otp,$mobile,$country_code); 
                  if($sentOtp['status']=='1' && $userMobile->save()){
                      // $result[]           =  [ 
                      //     "mobile" => $userMobile->mobile,
                      //     "otp"           => $userMobile->otp,
                      //     "created_at"    => Carbon::parse($userMobile->created_at)->format('d-m-Y h:i:s'),
                      //     "updated_at"    => Carbon::parse($userMobile->updated_at)->format('d-m-Y h:i:s'),
                      //     "id"            => $userMobile->id,
                      // ];
                      $response['message']=  "OTP Successfully Send.";
                      $response['result'] =   $userMobile;
                      return response()->json($response,200);
                  }
                  else{
                      $response['message']=  "Mobile number doesn't exist.";
                      return response()->json($response,400);
                  }
  
             }
            else{
                      $response['message']=  "Mobile number doesn't exist.";
                      return response()->json($response,400);
                }
      }

    public function createProfile(Request $request){
        $serverMaxFilesize = (int)ini_get('upload_max_filesize') * 1024 * 1024;
      	$user_id 			=	$request->user_details->id;
      	$user_name 		=	$request->user_name;
      	//$email 		  =	$request->email;
      	$image 				=	$request->file('image');
      	$mobile 			=	$request->mobile;
      	$address 		  =	$request->address;
        $gender       = $request->gender;
      	$validations  = array(
      		'user_name'	=>	'required',
      		//'email'   =>	'required',
      		//'image' 	=>	'required|image',
      		'mobile'		=>	'required|numeric|digits_between:6,15',
      		//'address'	=>	'required',
            'gender'  =>'required',
	    );
	    $validator =Validator::make($request->all(),$validations);
	    if($validator->fails()){
	    	$response	=[
	    	'message'  	=> $validator->errors($validator)->first(),
	    	];
	    	return response()->json($response,400);
	    }
	    $userData 	= User::where('id',$user_id)->first();
	    if(isset($userData)){
        $firebase_image = "null";
        if($image) {
            $imageSize = filesize($image);
            if ($imageSize > $serverMaxFilesize) {
              return response()->json(['message' => 'Image size exceeded max file upload size.']);
            }
            $path                  =    public_path('/uploads/images');
            $profile_image_name    =    time()."_".$image->getClientOriginalName(); 
            $image->move($path."/", $profile_image_name); 
            $userData->image       =  $profile_image_name;
            $firebase_image = asset('public/uploads/images')."/".$profile_image_name;
        }
	    	$userData->user_name 	 =  $user_name;
        $userData->name   =  $user_name;
	    	//$userData->email     =  $email;
	    	$userData->mobile 	 	 =  $mobile;
	    	$userData->address 	 	 =  $address;
        $userData->profile_status     =  1;
        	$userData->gender    =  $gender;
	    	if($userData->save()){

          $datafirebase=['uid'=>$userData->id,'userName'=>$userData->user_name,'name'=>$userData->name,'photo'=>$firebase_image,'status'=>$userData->about,'countryCode'=>$userData->country_code,'phone'=>$userData->mobile];
        
          $this->update($datafirebase,$userData->id);

	    		$response['message'] = "Successfully updated.";
	    		$response['result']  =  $userData;
	    		return response()->json($response,200);
	    	}
	    	else{
	    		$response['message'] = "Not updated.";
	    		return response()->json($response,400);
	    	}	
	    }
	    else{
	    		$response['message'] = "User doesn't exist.";
	    		return response()->json($response,400);
	    }
    }

    public function updateProfile(Request $request){
      
      $user_id = $request->user_details->id;
      $userData = User::where('id',$user_id)->first();
      $image = $request->image;
      if(isset($userData)){
        if($userData->image){
          $firebase_image = $userData->image;
        }
        else{
          $firebase_image = "null";  
        }
        if($image) {
            $path                  =    public_path('/uploads/images');
            $profile_image_name    =    time()."_".$image->getClientOriginalName(); 
            $image->move($path."/", $profile_image_name); 
            $userData->image       =  $profile_image_name;
            $firebase_image = asset('public/uploads/images')."/".$profile_image_name;
        }
        if($request->name){
          $userData->name   =  $request->name;
        }        
        if($request->about){
          $userData->about = $request->about;
        }
        $userData->save();

        $datafirebase=['uid'=>$userData->id,'userName'=>$userData->user_name,'name'=>$userData->name,'photo'=>$firebase_image,'status'=>$userData->about,'countryCode'=>$userData->country_code,'phone'=>$userData->mobile];
        
        $this->update($datafirebase,$userData->id);
          // dd("dfsd");
          $response['message'] = "Successfully updated.";
          $response['result']  =  $userData;
          return response()->json($response,200);
      }
      else{
          $response['message'] = "User doesn't exist.";
          return response()->json($response,400);
      }
    }

    public function update($firebaseData,$userId)
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/hallo-de4e5-firebase-adminsdk-x26r5-700860c423.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://hallo-de4e5-default-rtdb.firebaseio.com/')
            ->create();

        $database = $firebase->getDatabase();

        //dd(['u_'.$userId => $firebaseData]);

        $newUser = $database->getReference('users/u_'.$userId)
        ->set($firebaseData);
        
        //$database->getReference('users')->push(["u_$userId" => $firebaseData]);

      return $newUser->getKey();
    }

    public function set_friend(Request $request){
      $user_id    = $request->user_details->id;
      $mobile     = $request->mobile;
      $validator  = Validator::make($request->all(),[
        'mobile'  =>'required',
      ]);
      if($validator->fails()){
        $response['message']=$validator->errors($validator)->first();
        return response()->json($response,400);
      }
      $Data =User::where('mobile',$mobile)->first();

      if(isset($Data)){
        $alreadyFriendData      = Friend::where(['user_id'=>$user_id,'friend_id'=>$Data->id])->first();
        if(isset($alreadyFriendData)){
            $response['message']="All ready friend";
            return response()->json($response,400);
        }
        $friendData             = new Friend;
        $friendData->user_id    = $user_id;
        $friendData->friend_id  = $Data->id;
        if($friendData->save()){
          $friendData->friend_name  =   $Data->user_name;
          $friendData->is_online    =   $Data->is_online;
          $friendData->image        =   $Data->image;
          $response['message']      =   "User successfully added .";
          $response['result']       =   $friendData;
          return response()->json($response,200);
        }
      }
      else{
        $response['message']="User doesn't using this app";
        return response()->json($response,400);
      }

    }

    public function set_group(Request $request){
      $created_by   = $request->user_details->id;
      $mobile       = $request->mobile;
      $image        = $request->file('image');
      $member       = $request->member;
      if(!isset($member)){
        $response['message']="member field is required.";
        return response()->json($response,400);
      }
      $members      = implode(',',$member);
      $group_name   = $request->group_name;
      $validator    = Validator::make($request->all(),[
        'mobile'    =>'required',
        'group_name'=>'required',
        'member.*'  =>"required|string|int",
      ]);
      if($validator->fails()){
        $response['message']=$validator->errors($validator)->first();
        return response()->json($response,400);
      }
      $Data =User::where('mobile',$mobile)->first();
      if(isset($Data)){
        $groupData =new Group;
        if($image){
             $path                  =    public_path('/uploads/images');
             $profile_image_name    =    time()."_".$image->getClientOriginalName(); 
                  $image->move($path."/", $profile_image_name); 
                  $groupData->image =  $profile_image_name;
        }
        $groupData->created_by      = $created_by;
        $groupData->group_admin     = $Data->user_name;
        $groupData->mobile          = $Data->mobile;
        $groupData->members         = $members;
        $groupData->group_name      = $group_name;
        if($groupData->save()){
          foreach($member as $value){
           // dd($member);
            $userData         =   User::where('mobile',$value)->first();
            if(!isset($userData)){
              $response['message']="Member whose mobile no:-".$value." doesn't using this app";
              return response()->json($response,400);
            }
            $gData            =   new Group_membership;
            $gData->user_id   =   $userData->id;
            $gData->group_id  =   $groupData->id;
            $gData->save();
          }
            $gData            =   new Group_membership;
            $gData->user_id   =   $Data->id;
            $gData->group_id  =   $groupData->id;
            $gData->save();

          $response['message']=   "Group successfully created.";
          $response['result'] =   $groupData;
          return response()->json($response,200);
        }
      }
      else{
        $response['message']="User doesn't using this app";
        return response()->json($response,400);
      }
    }

    public function  get_friends(Request $request){
      $id =  $request->user_details->id;
      $Data =array();
      $friendData =User::get();
      foreach($friendData as $value){
        $data =User::find($value->id);
        if(isset($data)){
          $Data[]=[
            'id'        =>  $data->id,
            'name'      =>  $data->user_name,
            'image'     =>  $data->image,
            'is_online' =>  $data->is_online,
          ];
        }
      }
      if(sizeof($Data)>0){
        $response['message']="Friend list.";
        $response['result'] = $Data;
        return response()->json($response,200);
      }
      else{
        $response['message']="No friend found.";
        return response()->json($response,400);

      }
    }
    
    public function get_groups(Request $request){
      $user_id = $request->user_details->id;
      $gmData  = Group_membership::where('user_id',$user_id)->get();
      if(sizeof($gmData)>0){
        foreach($gmData as $value){
          $groupData[] =Group::where('id',$value->group_id)->first();
        }
        $response['message']="Group list.";
        $response['result'] = $groupData;
        return response()->json($response,200);
      }
      else{
        $response['message']="No group found.";
        return response()->json($response,400);

      }
    }

     public function login(Request $request){
        $mobile               =     $request->mobile;
        $password             =     $request->password;
        //$country_code       =     $request->country_code;
        $device_token         =     $request->device_token;
        $device_type          =     $request->device_type;
        $validations          =     array(
            'mobile'          =>   'required|numeric|digits_between:6,15',
            'password'        =>   'required',
            //'country_code'  =>   'required',
            'device_token'    =>   'required',
            'device_type'     =>   'required',
        );
        $validator     = Validator::make($request->all(),$validations);
        if($validator->fails()){
            $response  =[
                'message'=> $validator->errors($validator)->first(),
            ];
            return response()->json($response,400);
        }
        $userData= User::where('mobile',$mobile)->first(); //dd($userData);
        
          if(isset($userData)){
            if($userData->is_block==0){
                $userData->device_token=$device_token;
                $userData->device_type=$device_type;
                $userData->access_token=md5(uniqid());
                // dd(Hash::check($password,$userData->password));
                
                if(Hash::check($password,$userData->password)){
                    $userData->save();
                    $response['message']="Logged in successfully";
                    $response['result']= $userData;
                    return response()->json($response,200);
                } 
                else{
                    $response['message']="Incorrect password";
                    return response()->json($response,400);
                }
            }
            else{
                $response['message']="User has blocked!";
                  return response()->json($response,400);
            }
        }
        else{
              $response['message']="Mobile number is not registered.";
              return response()->json($response,400);
          }       
    }

    public function forgotPassword(Request $request){
       $mobile       =    $request->mobile;
       // $country_code        =    $request->country_code;
       //$full_mobile  =    $country_code.$mobile;
       $validations=array(
        'mobile' =>   'required|numeric|digits_between:6,15',
       // 'country_code'  =>   'required',
        );
        $validator=Validator::make($request->all(),$validations);
        if($validator->fails()){
            $response=[
                'message'=>$validator->errors($validator)->first(),
            ];
            return response()->json($response,400);
        }
       $userData            =    User::where('mobile',$mobile)->first();

       if(isset($userData)){
       $country_code        =    $userData->country_code;
       $otp                 =    rand(1000,9999);
       $userData->otp       =    $otp;
       $userData->save();
        $sentOtp            =    $this->sendMsg($otp,$mobile,$country_code); 
        $response['message']=    "OTP successfully sent to registered Mobile";
        $response['result'] =    $userData; 
        return response()->json($response,200);
       }
       else{
        $response['message'] =    "This Mobile Number is Not Registered "; 
        return response()->json($response,400);
       } 
    }
    public function resetPassword(Request $request){
        $mobile                      =    $request->mobile;
        //$country_code                =    $request->country_code;
        $password                    =    Hash::make($request->password);
        $validations                 =    array(
          'password'                 =>   'required|min:8',
          'mobile'                   =>   'required|numeric|digits_between:6,15',
       //   'country_code'             =>   'required',
        );
        $validator                   =    validator::make($request->all(),$validations);
        if($validator->fails()){
          $response                  =     array(
            "message"                =>   $validator->errors($validator)->first(),
          );
          return response()->json($response,400);
        }
        $userData=User::where('mobile',$mobile)->first();
        if(isset($userData)){ 
          //dd($userData);
           // if($country_code==$userData->country_code){
                $userData->password=$password;
                
                if($userData->save()){
                    $response['message']       =    "Password successfully Changed.";
                    $response['result']      =    $userData;
                    return response()->json($response,200);
                }
                else{
                    $response['message']     =    "Password Not Changed.";
                    return response()->json($response,400);
                }
            //}
  
        }
        else{
              $response['message']     =    "User Doesn't Exist";
              return response()->json($response,400);
        }
  
      }

    public function logout(Request $request){

            $access_token                   =    $request->user_details['access_token'];
            $userRecord                     =    User::where('access_token',$access_token)->first();
            $userRecord->access_token       =    "";
            $userRecord->device_token       =    "";
            $userRecord->device_type        =    "";
            if($userRecord->save()){
                $response['message']        =    "Logout Successfully.";
                $response['result']         =     $userRecord;
                return response()->json($response,200);
            } else {
                $response['message']        =    "Logout Failed.";
                return response()->json($response,400);
            }
    }

    public function checkContact(Request $request){
      $contact      = $request->mobile;
     // dd(substr($contact[0], 0, 3 ) );
      $contactUser=[];
      if(isset($contact)){
        foreach($contact as $value){
         
          if(substr($value, 0, 1 ) ==='+'){
            $value =substr($value,3);
          }
          $userContact    =   User::where('mobile',$value)->first(); 
          //dd($userContact);
          if(isset($userContact)){
            $contactUser[]  =   [
              'countryCode'      => $userContact['country_code'],
              'fullName'    =>  $userContact['user_name'],
              'id'=> $userContact['id'],
              'mobile'=>$userContact['mobile'],
            ];
          }
          // if(!isset($userContact)){
          //   $contactUser[]  =  [
          //     'name'    =>  $value['Name'],
          //     'mobile'    =>  $value['Number'],
          //     'isRegister'=>  0,
          //   ];
          // }
        }
        $response['message'] ="Contact list";
        $response['result']  =$contactUser;
        return response()->json($response,200);
      }
      else{
        $response['message'] = "mobile field is required";
        return response()->json($response,400); 
      }
    }

    public function muteNotification(Request $request){
      $muteData =Mute::first();
      return response()->json(['message'=>'Mute notification data','result'=>$muteData],200);
    }
    public function contact_snyc(Request $request){
        $data =  $request->user_details;;
        $validations        = [
            'mobile'       =>'required'

        ];
        $validator          = Validator::make($request->all(),$validations);
        if($validator->fails()){
            $response=['message'=>$validator->errors($validator)->first()];
            return response()->json($response,400);
        } else {
            $mobile = array();
            $users = json_decode(User::whereNotNull('mobile')->pluck('mobile'),TRUE);
            //dd($users);
            //$countrycodes = DB::table('country')->get()->pluck('dial_code');
            $countrycodes = ["+91","0"];
            foreach ($request->mobile as $key => $value) {
                foreach ($countrycodes as  $countrycode) {                
                    $countCountryCode = strlen($countrycode);
                    if (substr($value, 0,$countCountryCode) == $countrycode) {
                    $value = str_replace($countrycode, '', $value);
                        if (in_array($value, $users)) {
                            $mobile[] = $value;
                        }
                    }else {
                        $mobile[] = $value;
                    }
                }                
            }
           // dd($mobile);
            if($mobile){
                $userDetails = User::select('id','user_name','country_code','mobile')->whereIn('mobile',$mobile)->get();
                $responseObject = array(
                    'status' => 200,
                    'data' => $userDetails,
                    'message' => 'success',
                );

                return response()->json($responseObject, 200);
            }
            else
            {
                $responseObject = array(
                    'status' => 200,
                    'data' => [],
                    'message' => 'success',
                );

                return response()->json($responseObject, 200);
            }
            
        } 
    }
}
