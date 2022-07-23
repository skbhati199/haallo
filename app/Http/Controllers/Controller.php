<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     public function update($data,$id){
        
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Api/hallo-de4e5-firebase-adminsdk-x26r5-700860c423.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://hallo-de4e5-default-rtdb.firebaseio.com/')
        ->create();

        $firebase1 = $firebase->getDatabase();

        //$firebase1->getReference('users');
        $ref=$firebase1->getReference('users');

        $ref->getChild('u_'.$id)->update($data);
    }
}
