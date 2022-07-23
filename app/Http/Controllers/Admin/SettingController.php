<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Help;
use App\User;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use App\Story;
use App\Models\SettingManagement;
use App\Support;
use DB;
use Carbon\Carbon;
use App\UserRateing;
use App\Group;
use App\Friend;



class SettingController extends Controller
{
    public function SettingManagement(Request $request){
            $result['settings']= SettingManagement::first();
    	   return view('admin.demo')->with($result);
    }

    public function changePassword(Request $request) {
        dd(Auth::guard('admin')->id);
    }

    public function termsAndConditions(Request $request) {
        $settingManagement = SettingManagement::first();
        $settingManagement->terms_and_conditions = $request->terms_and_conditions;
        $settingManagement->save();
        return redirect()->back()->with('success-message', 'Terms and Conditions Updated successfully.');
            
    }

    public function privacyPolicy(Request $request) {
        // dd($request->all());
        $settingManagement = SettingManagement::first();
        $settingManagement->privacy_policy = $request->description;
        $settingManagement->save();
        return redirect()->back()->with('success-message', 'Privacy Policy Updated successfully.');


    }

    public function helps(Request $request) {
        $settingManagement = SettingManagement::first();
        $settingManagement->help = $request->help;
        $settingManagement->save();
                return redirect()->back()->with('success-message', 'Help Updated successfully.');

    }

    public function faqs(Request $request) {
        $settingManagement = SettingManagement::first();
        $settingManagement->faqs = $request->faqs;
        $settingManagement->save();
        return redirect()->back()->with('success-message', "FAQ's Updated successfully.");
    }

    public function legal(Request $request) {
        $settingManagement = SettingManagement::first();
        $settingManagement->legal = $request->legal;
        $settingManagement->save();
        return redirect()->back()->with('success-message', "Legal Updated successfully.");
    }

    public function aboutUs(Request $request) {
        $settingManagement = SettingManagement::first();
        $settingManagement->about_us = $request->about_us;
        $settingManagement->save();
                return redirect()->back()->with('success-message', "Avout-Us Updated successfully.");

    }

    public function contact(Request $request) {
        $settingManagement = SettingManagement::first();
        $settingManagement->contact = $request->contact;
        $settingManagement->save();
        return redirect()->back()->with('success-message', "Contact Updated successfully.");

    }

    public function help(Request $request){

        if($request->method()=='GET'){
            
            $static = Help::first();
            $text   = @$static->help_text;
            return view('admin.help',compact('text'));
        }else{
             Help::where('deleted_at',null)->update(["help_text"=>$request['text']]);
            return redirect()->back();
        }

    }

    public function help_web(Request $request,$id){
        $helpData =Help::first();
        return view('admin.help-web',compact('helpData','id'));
    }

    public function termCondition($id){
        return view('admin.term-condition',compact('id'));
    }

    public function caller_list(Request $request){
        $data =User::get();
        return view('admin.caller-list',compact('data')); 
    }

    public function caller_details(Request $request,$id){
       
        $data =User::get();
        return view('admin.caller-details',compact('data')); 
    }
    
    public function story(Request $request){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/haallo-acb17-firebase-adminsdk-f0zmq-8b5b03a56b.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $reference = $database->getReference('status');//->getChild();
        $snapshot = $reference->getSnapshot();
        $value = $snapshot->getValue();
        $statusData =array();
        if(count($value)>0){
            foreach($value as $key=>$val){
                $statusData['user_id']=str_replace("u_","",$key);
                $statusData['user_id']=str_replace('"',"",$statusData['user_id']);
                $userData =User::find($statusData['user_id']);
    
                if(isset($userData)){
                   // dd($userData);
                    $statusData['user_name']=$userData->name;
                    $statusData['user_image']=$userData->image;
                    $statusData['is_online']=$userData->is_online;
                    $statusData['user_name']=$userData->name;
                   foreach($val as $va){
                    if($va['timestamp']-time()>0){
                        //dd($va);
                        $statusData['image']=$va['content'];
                        $data[] =$statusData;
                    }
                
                   }
                }
            }
        }
        return view('admin.story-management',compact('data'));
    }
    public function story_management_details(Request $request,$id){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/haallo-acb17-firebase-adminsdk-f0zmq-8b5b03a56b.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $reference = $database->getReference('status')->getChild('u_'.$id);
        $snapshot = $reference->getSnapshot();
        $value = $snapshot->getValue();
        //dd(count($value));
        $statusData =array();
        if(count($value)>0){
            foreach($value as $key=>$val){
                $userData =User::find($id);
                if(isset($userData)){
                   // dd($userData);
                    $statusData['user_name']=$userData->name;
                    $statusData['user_image']=$userData->image;
                    $statusData['is_online']=$userData->is_online;
                    $statusData['user_name']=$userData->name;
                   
                    if($val['timestamp']-time()>0){
                        //dd($va);
                        $statusData['image']=$val['content'];
                        $data =$statusData;
                    }                
                   
                }
            }
        }
        return view('admin.story-management-details',compact('data'));
    }
    public function submit_story(Request $request){
        $image =$request->file('photo');
        $v_dio =$request->file('v_dio');
        $status=$request->status;
        $storyData =new Story;
        if($image) {
            $path                  =    public_path('/uploads/images');
            $profile_image_name    =    time()."_".$image->getClientOriginalName(); 
            $image->move($path."/", $profile_image_name); 
            $storyData->image      =  $profile_image_name;
        }
        if($v_dio){
            $path                  =    public_path('/uploads/images');
            $profile_image_name    =    time()."_".$v_dio->getClientOriginalName(); 
            $v_dio->move($path."/", $profile_image_name); 
            $storyData->video      =  $profile_image_name;
        }
        if($status){
            $storyData->status =$status;
        }
        if($storyData->save()){
            return redirect()->back()->with('success-message',"Story successfully saved");
        }
    }

    public function suportMgmt(){
        $data=Support::get();
        return view('admin.support-mgmt',compact('data'));
    }

   public function ReportMgmt(Request $req)
    {
        if($req->method()=="GET"){
            return view('admin.report-mgmt');
        }else{
            if($req->same=="total_user"){

                if($req->form_date_ && $req->to_date){
                    
                     $data=User::whereBetween('created_at',[$req->form_date_ , $req->to_date])->get();
                      if(count($data)>0){
                         $tot_record_found=0;
                                    //if($value!=4){
                                      $export_data="Sr No,Name,Email ID,Mobile,gender,joiningDate\n";
                                      foreach($data as  $value){
                                        $tot_record_found=1;
                                         $export_data.=$value['id'].','.$value['user_name'].','.$value['email'].','.$value['mobile'].','.$value['gender'].','.$value['created_at']."\n";
                                      }

                                        return response($export_data)
                                  ->header('Content-Type','application/xls')               
                                  ->header('Content-Disposition', 'attachment; filename="User.csv"')
                                  ->header('Pragma','no-cache')
                                  ->header('Expires','0');                     
                             return view('download',['record_found' =>$export_data]);

                      }else{
                         return redirect()->back()->with('success','No data exist between these dates.');
                      }

                }else{

                    $data=User::get();
                      if(count($data)>0){
                         $tot_record_found=0;
                                    //if($value!=4){
                                      $export_data="Sr No,Name,Email ID,Mobile,gender,joiningDate\n";
                                      foreach($data as  $value){
                                        $tot_record_found=1;
                                         $export_data.=$value['id'].','.$value['user_name'].','.$value['email'].','.$value['mobile'].','.$value['gender'].','.$value['created_at']."\n";
                                      }

                                        return response($export_data)
                                  ->header('Content-Type','application/xls')               
                                  ->header('Content-Disposition', 'attachment; filename="User.csv"')
                                  ->header('Pragma','no-cache')
                                  ->header('Expires','0');                     
                             return view('download',['record_found' =>$export_data]);

                      }else{
                         return redirect()->back()->with('success','No data exist between these dates.');
                      }

                }
            }

            if($req->same=="total_group"){
                if($req->form_date_ && $req->to_date){
                    $data=Group::whereBetween('created_at',[$req->form_date_ , $req->to_date])->get();
                      if(count($data)>0){
                         $tot_record_found=0;
                                    //if($value!=4){
                                      $export_data="Sr No,Group Name,group_admin,Members,Mobile,joiningDate\n";
                                      foreach($data as  $value){
                                        $tot_record_found=1;
                                         $export_data.=$value['id'].','.$value['group_name'].','.$value['group_admin'].','.$value['members'].','.$value['mobile'].','.$value['created_at']."\n";
                                      }

                                        return response($export_data)
                                  ->header('Content-Type','application/xls')               
                                  ->header('Content-Disposition', 'attachment; filename="Group.csv"')
                                  ->header('Pragma','no-cache')
                                  ->header('Expires','0');                     
                             return view('download',['record_found' =>$export_data]);

                      }else{
                         return redirect()->back()->with('success','No data exist between these dates.');
                      }

                }else{

                     $data=Group::get();
                      if(count($data)>0){
                         $tot_record_found=0;
                                    //if($value!=4){
                                      $export_data="Sr No,Group Name,group_admin,Members,Mobile,joiningDate\n";
                                      foreach($data as  $value){
                                        $tot_record_found=1;
                                         $export_data.=$value['id'].','.$value['group_name'].','.$value['group_admin'].','.$value['members'].','.$value['mobile'].','.$value['created_at']."\n";
                                      }

                                        return response($export_data)
                                  ->header('Content-Type','application/xls')               
                                  ->header('Content-Disposition', 'attachment; filename="Group.csv"')
                                  ->header('Pragma','no-cache')
                                  ->header('Expires','0');                     
                             return view('download',['record_found' =>$export_data]);

                      }else{
                         return redirect()->back()->with('success','No data exist between these dates.');
                      }

                }
            }

            if($req->same=="total_friend"){
                if($req->form_date_ && $req->to_date){

                    $data=Friend::with('getUser')->whereBetween('created_at',[$req->form_date_ , $req->to_date])->get();
                      if(count($data)>0){
                         $tot_record_found=0;
                                    //if($value!=4){
                                      $export_data="Sr No,Name,Email ID,Mobile,gender,joiningDate\n";
                                      foreach($data as  $value){
                                        $tot_record_found=1;
                                         $export_data.=$value['id'].','.$value->getUser['user_name'].','.$value->getUser['email'].','.$value->getUser['mobile'].','.$value->getUser['gender'].','.$value['created_at']."\n";
                                      }

                                        return response($export_data)
                                  ->header('Content-Type','application/xls')               
                                  ->header('Content-Disposition', 'attachment; filename="Friend.csv"')
                                  ->header('Pragma','no-cache')
                                  ->header('Expires','0');                     
                             return view('download',['record_found' =>$export_data]);

                      }else{
                         return redirect()->back()->with('success','No data exist between these dates.');
                      }

                }else{

                     $data=Friend::with('getUser')->get();
                      if(count($data)>0){
                         $tot_record_found=0;
                                    //if($value!=4){
                                      $export_data="Sr No,Name,Email ID,Mobile,gender,joiningDate\n";
                                      foreach($data as  $value){
                                        $tot_record_found=1;
                                         $export_data.=$value['id'].','.$value->getUser['user_name'].','.$value->getUser['email'].','.$value->getUser['mobile'].','.$value->getUser['gender'].','.$value['created_at']."\n";
                                      }

                                        return response($export_data)
                                  ->header('Content-Type','application/xls')               
                                  ->header('Content-Disposition', 'attachment; filename="Friend.csv"')
                                  ->header('Pragma','no-cache')
                                  ->header('Expires','0');                     
                             return view('download',['record_found' =>$export_data]);

                      }else{
                         return redirect()->back()->with('success','No data exist between these dates.');
                      }
                }
            }

            if($req->same){

            }else{
                return back()->with('success','Please Choose At least One');
            }

        }

    }

    public function deleteSupport($id){
        Support::where('id',$id)->delete();
        return back();
    }

    public function Rateing(){
        $rateing=UserRateing::orderBy('id','desc')->get();
        return view('admin.rateing-mgmt',compact('rateing'));
    }

    public function viewRateing($id){
        $data=UserRateing::where('id',$id)->first();
        $rateing=UserRateing::where('id',$id)->sum('rateing');
        $value=UserRateing::where('id',$id)->count();
        $total=$rateing/$value;


        return response()->json(['data'=>$data,'total'=>$total]);
    }



}
