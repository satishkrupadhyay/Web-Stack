<?php

namespace Jivoni\Http\Controllers\Auth;

use Jivoni\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    
    //protected $redirectAfterLogout = '/welcome';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }


    // protected function guard()
    // {
    //     return Auth::guard('user');
    // } 


    public function logout(Request $request) {

        Auth::logout();
        return redirect('/');
    }



    public function validateCredentials(Request $request) {

        $email = $request->email;
        $password = $request->password;
        $rememberMe = false;

        if($request->remember == 'true'){
            $rememberMe = true;
        }

        $userDetails = DB::table('users')
        ->where('email', '=', $email)
        ->first();

        if( count( $userDetails ) == 0 ) {
            echo "notfound";
        } else {
            if( $userDetails->status == 1 ) {
                if( Auth::attempt(['email' => $email, 'password' => $password], $rememberMe) ) {
                    echo "granted";
                } else {
                    echo "denied";
                }
            } else {
                echo "notverified";
            }

        }

    }


    public function validatePharmCredentials(Request $request) {

      $email = $request->email;
      $password = $request->password;
      $rememberMe = false;

      if($request->remember == 'true'){
        $rememberMe = true;
    }

    $adminDetails = DB::table('admins')
                        ->where('store_email', '=', $email)
                        ->first();

    if( count( $adminDetails ) == 0 ) {
        echo "notfound";
    } else {
        if( Auth::guard('admin')->attempt(['store_email' => $email, 'password' => $password], $rememberMe) ) {
            echo "granted";
        } else {
            echo "denied";
        }

    }


}
}
