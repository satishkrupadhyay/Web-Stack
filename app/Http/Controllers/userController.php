<?php

namespace Jivoni\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;

use Auth;
use App\User;
use \App\MSG91;

class userController extends Controller
{
    public function index(){
        if (Auth::user() == null){
            return view("login");
        }else{
            return redirect('/home');
        }
    }

    /**
    * Function for Login.
    *
    * @return Response
    */
    public function userLogin(Request $request){

        $password = $request->input('password');
        $email = $request->input('email');

        if (Auth::attempt([ 'email'=> $email, 'password'  => $password ])) {

            echo json_encode(array(
                'loggedIn' => true
            ));
        }else{
            echo json_encode(array(
                'loggedIn' => false,
                'error' => "Wrong Email password Combinatoin."
            ));
        }
    }

    /**
    * Display the the Home page.
    *
    * @return Response
    */
    public function home(Request $request){

        if (Auth::user() != null){

            //Getting User information.
            $users = User::where('id', Auth::user()->id)->first();
            $users['mobile'] = substr($users['mobile'], -4);

            return view("myHome",compact('users'));
        }else{
            return redirect('/');
        }
    }

    /**
    * Function to log out User
    * @return Response
    */
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function sendOtp(Request $request){

    $response = array();
    $userId = Auth::user()->id;

    $users = User::where('id', $userId)->first();

    if ( isset($users['mobile']) && $users['mobile'] =="" ) {
        $response['error'] = 1; 
        $response['message'] = 'Invalid mobile number';
        $response['loggedIn'] = 1;
    } else {

        $otp = rand(100000, 999999);
        $MSG91 = new MSG91();

        $msg91Response = $MSG91->sendSMS($otp,$users['mobile']);

        if($msg91Response['error']){
            $response['error'] = 1;
            $response['message'] = $msg91Response['message'];
            $response['loggedIn'] = 1;
        }else{

            Session::put('OTP', $otp);

            $response['error'] = 0;
            $response['message'] = 'Your OTP is created.';
            $response['OTP'] = $otp;
            $response['loggedIn'] = 1; 
        }
    }
    echo json_encode($response);
}

public function verifyOtp(Request $request){

    $response = array();

    $enteredOtp = $request->input('otp');
    $userId = Auth::user()->id;  //Getting UserID.

    if($userId == "" || $userId == null){
        $response['error'] = 1;
        $response['message'] = 'You are logged out, Login again.';
        $response['loggedIn'] = 0;
    }else{
        $OTP = $request->session()->get('OTP');
        if($OTP === $enteredOtp){

            // Updating user's status "isVerified" as 1.

            User::where('id', $userId)->update(['isVerified' => 1]);

            //Removing Session variable
            Session::forget('OTP');

            $response['error'] = 0;
            $response['isVerified'] = 1;
            $response['loggedIn'] = 1;
            $response['message'] = "Your Number is Verified.";
        }else{
            $response['error'] = 1;
            $response['isVerified'] = 0;
            $response['loggedIn'] = 1;
            $response['message'] = "OTP does not match.";
        }
    }
    echo json_encode($response);
}
}

