<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $access_token = $request->header('accessToken');   
      if(!isset($access_token))
      {   
              $response['message'] ="Insert Access Token .";
              return response()->json($response,400);
      }
      $userData     =User::where('access_token',$access_token)->first(); 
        if(!isset($userData))
        {   
                $response['message'] ="Unauthorised Aceess";
                return response()->json($response,401);
        }
        if($access_token!=$userData->access_token)
        {
                $response['message'] ="Unauthorised Aceess ";
                return response()->json($response,401);
        }
        $request['user_details'] = $userData;
        return $next($request);
    }
    
}
