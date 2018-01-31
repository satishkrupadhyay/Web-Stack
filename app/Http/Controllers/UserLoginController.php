<?php

namespace Jivoni\Http\Controllers;

use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function validateCredentials(Request $request) {

        $checkFlag = false;

        $email = $request->email;
        $password = $request->password;

        $rememberMe = false;

        if($request->remember == 'true'){
            $rememberMe = true;
        }
    

        $userDetails = DB::table('users')
                            ->where('email', '=', $email)
                            ->first();

        // if( count($userDetails) == 0 ) {
        //     echo 1;
        // } else {
            
            if( Auth::guard('user')->attempt(['email' => $email, 'password' => $password], $rememberMe) ) {

                echo "done";
            } else {
                echo "no";
            }
        //}

    }
}
