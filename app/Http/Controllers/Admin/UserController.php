<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;
use Mail;
use Hash;
use App\User;
use App\Mute;
use Carbon\Carbon;
use App\Friend;
use App\Group;
use App\Models\SettingManagement;

class UserController extends Controller
{
    public function TermCondition(){
        $data = SettingManagement::where('id', 1)->first();
        return view('term-condition')->with('data', $data)->with('type', '1');
    }

    public function PrivacyPolicy(){
        $data = SettingManagement::where('id', 1)->first();
        return view('term-condition')->with('data', $data)->with('type', '2');
    }

    public function AboutUs(){
        $data = SettingManagement::where('id', 1)->first();
        return view('term-condition')->with('data', $data)->with('type', '3');
    }

    public function Legal(){
        $data = SettingManagement::where('id', 1)->first();
        return view('term-condition')->with('data', $data)->with('type', '4');
    }

    public function Help(){
        $data = SettingManagement::where('id', 1)->first();
        return view('term-condition')->with('data', $data)->with('type', '5');
    }

    public function faqs(){
        $data = SettingManagement::where('id', 1)->first();
        return view('term-condition')->with('data', $data)->with('type', '6');
    }

   public function adminlogin(Request $request){
   	//dd($request->all());
   	if (Auth::guard('admin')->attempt(array('email' => $request->email, 'password' =>  $request->password)))
        {
            return redirect()->intended('/admin/index');
        }
        else
        {
            //dd('invalid');
            return redirect()->back()->with('fail-message', 'Login Failed');
        }
   }

   public function index(Request $request){

        $users_registerd = User::all();
        $users = User::where('is_block',0)->get();
        $online_users = User::where('is_online',1)->get();
        $block_users = User::where('is_block',1)->get();
        $today_users = User::where('created_at', '>=', Carbon::today())->get();  
        $totalfriendCount = Friend::get();  
        $totalGroup = Group::get();
        $usersdiagram = User::get()->pluck('created_at')->ToArray();
        
        // dd($usersdiagram);
        // dd(implode(",",$usersdiagram));
        $usersdiagram = implode(",",$usersdiagram);
       
        // dd($usersdiagram);

        return view('admin.index', compact('users','online_users','block_users','users_registerd','today_users', 'totalfriendCount', 'totalGroup', 'usersdiagram'));
   }

   public function forgot_password(Request $request){
   	return view('admin.forgot-password');
   }

   public function link_send(Request $request){
        $email = $request->email;
        $data  = Admin::where('email',$email)->first();
        if($data){
            $resetLink = url('reset-password').'/'.$data->id; 
        $data = [
                                      'resetLink'=>$resetLink,
                                     'email' => $email,          
                                  ];
                            try{
                                Mail::send(['text'=>'resetLink'], $data, function($message) use ($data)
                                {
                                     $message->to($data['email'])
                                             ->subject ('Haallo OTP verification');
                                     $message->from('info@Haallo.com');
                               });
                               // $response['message']='';
                                //$user_data->save();
                                //$response['response']=$user_data;
                                return redirect()->back()->with('success-message','Reset link Successfully Sent on Your Mail.');
                            }catch(Exception $e){
                                // $response=[
                                //     'message' => $e->getMessage()
                                // ];

                                 return redirect()->back()->with('fail-message','Reset link Not  Sending failed.');
                            }
          }
          else{
              return redirect()->back()->with('fail-message','Email does not match to existing emails.');
          }
    }

    public function reset_password(Request $request,$id){
    		return view('admin.reset-password',compact('id'));
    }

    public function  password_reset(Request $request){
        //dd($request->all());
        $id =$request->uid;
        $password=Hash::make($request->password);
        $adminData = Admin::find($id);
        if(isset($adminData)){
            $adminData->password=$password;
            if($adminData->save()){
                return redirect('admin')->with('success-message',"Password successfully updated");
            }
            else{
                return redirect()->back()->with('fail-message','Password does not changed .');
            }
        }
        else{
                return redirect()->back()->with('fail-message','Password does not changed .');
            }
    }
    public function profile(Request $request){
       $adminData = Auth::guard('admin')->user();
       return view('admin.profile',compact('adminData'));

    }
    public function edit_profile(Request $request){
        $adminData = Auth::guard('admin')->user();
        return view('admin.edit-profile',compact('adminData'));

    }
    public function update_profile(Request $request){
        $admin_id       =   Auth::guard('admin')->user()->id;
        $name           =   $request->name;
        $mobile         =   $request->mobile;
        $image          =   $request->file('image'); //dd($image);
        $email          =   $request->email;
        $city           =   $request->city;
        $description    =   $request->descript;
        $adminData      =   Admin::where('id',$admin_id)->first();
        if(isset($adminData)){
            if($image) {
            $path                  =    public_path('/uploads/images');
            $profile_image_name    =    time()."_".$image->getClientOriginalName(); 
            $image->move($path."/", $profile_image_name); 
            $adminData->image       =  $profile_image_name;
            }
            $adminData->name         =   $name;
            $adminData->mobile       =   $mobile;
            $adminData->email        =   $email;
            $adminData->city         =   $city;
            $adminData->description  =   $description;
            if($adminData->save()){
                return redirect()->back()->with('success-message', 'Profile successfully updated.');
            }
            else{
                return redirect()->back()->with('fail-message', 'Profile not updated.');
            }
        }
        else{
            return redirect()->back()->with('fail-message', "Admin doesn't exist.");
        }
        
    }
    public function change_password(Request $request){
        return view('admin.changePassword');
    }
    public function password_change(Request $request){

        $old_password = $request->old_password;
        $password  = $request->password;
        $adminData = Auth::guard('admin')->user(); //dd($adminData);
        if(Hash::check($old_password, $adminData->password)){
            $adminData->password=Hash::make($password);
            if($adminData->save()){
                return redirect()->back()->with('success-message', 'Password successfully changed.');
            }
            else{
                return redirect()->back()->with('fail-message', 'Password not changed.');
            }
        }
        else{
                return redirect()->back()->with('fail-message', 'Old Password not matched.');
        }

    }

    public function logout(Request $request){
        Auth::guard("admin")->logout();
        //Auth::guard("subadmin")->logout();
        // return view('admin.login');
      return redirect('admin');
    }
    public function user_list(Request $request){
    	$data = User::select('id','user_name','image','created_at','is_block')->get();
    	return view('admin.user-list',compact('data'));
    }

    public function user_details(Request $request,$id){
    	$data =User::select('user_name','mobile','image','created_at')->where('id',$id)->first();
    	return response()->json($data,200);
    }

    public function  user_block(Request $request,$id){
        if($id){
            $userData = User::where('id',$id)->first();
            if(isset($userData)){
                if($userData->is_block==0){
                   // dd('block');
                     $userData->is_block = 1;
                     $userData->save();
                     return redirect()->back();
                }
                if($userData->is_block==1){
                     //dd('unblock');
                     $userData->is_block = 0;
                      $userData->save();
                     return redirect()->back();
                }
            }
        }
    }
     public function delete_user(Request $request,$id){
        $userData = User::where('id',$id)->first();
        if(isset($userData)){
            if($userData->delete()){
                return redirect()->back()->with('success-message',"User data successfully deleted.");
            }
            else{
                return redirect()->back()->with('fail-message',"User not deleted.");
            }
        }
        else{
                return redirect()->back()->with('fail-message',"User not deleted.");
            }
    }
    public function sortBy(Request $request,$pstatus){
        if($pstatus==0){
            $data= User::get();
            $selectVal =0;
        }
        if($pstatus==1){
            $data= User::where('is_block',1)->get();
            $selectVal =1;
        }
        if($pstatus==2){
            $data = user::where('is_block',0)->get();
             $selectVal =2;
        }
        if($pstatus==3){
            $data= User::where('is_online',1)->get();
             $selectVal =3;
        }
        if($pstatus==4){
            $data= User::where('is_online',0)->get();
             $selectVal =4;
        }
        return view('admin.user-list',compact('data','selectVal'));
    }

    public function chat(Request $request){
        return view('admin.chat-management');
    }

    public function set_mute(Request $request ){
        $days              =   $request->days;
        $weeks             =   $request->weeks;
        $years             =   $request->years;
        $months            =   $request->months;
        $hours             =   $request->hours;
        $muteData          =   new Mute;
        $muteData->days    =   $days;
        $muteData->weeks   =   $weeks;
        $muteData->years   =   $years;
        $muteData->months  =   $months;
        $muteData->hours   =   $hours;  
        if($muteData->save()){
            return redirect()->back()->with('success-message',"Mute data successfully saved");
        }else{
            return redirect()->back()->with('fail-message','Mute data not saved');
        }
    }

}
