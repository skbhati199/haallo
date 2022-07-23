<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SettingManagement;


class SettingManagementController extends Controller
{
    public function SettingManagementfun(){
    	$setting= SettingManagement::get();
    	dd($setting);
    }

    public function supportMgmt(){
        return view('admin.support-mgmt');
    }
}
