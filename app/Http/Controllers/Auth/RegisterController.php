<?php

namespace Jivoni\Http\Controllers\Auth;

use Jivoni\Traits\SendOtp;
use Jivoni\User;
use Jivoni\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
use DB;
use Hash;
use Illuminate\Support\Facades\Input;
class RegisterController extends Controller

{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, SendOtp;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //         'phone' => 'required|regex:/[0-9]{10}/',
    //         'user_locality' =>  'required',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Jivoni\User
     */
    protected function create(array $data)
    {
        $template_path = 'registermail';
    //    $usr_email = Input::get('email');


        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'user_locality' => $data['user_locality'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
        ]);


        Mail::send(['text'=> $template_path ], array('email' => Input::get('email')), function($message) use ($user)
          {
             // $message->from('imdadul@simplisticsolutions.in','Admin')->to($request->get('email'))->subject('Order Placed');

             // $message->to($request->get('email'), 'Receiver Name')->subject('Order Placed');

              $message->to(Input::get('email'), 'Receiver Name')->subject('Registration Successful');

                      // Set the sender

              $message->from('satish@simplisticsolutions.in','Greetings');

                      

          });
            /*------------Successful Registration Confirmation Message---------------*/



              $authKey = "179537A8dc5PRixK59e43aea";

              //Multiple mobiles numbers separated by comma
              $mobileNumber = $user['phone'];
              // Customer Name
              $customer_name = $user['name'];
              
              //Sender ID,While using route4 sender id should be 6 characters long.
              $senderId = "Jivoni";

              //Your message to send, Add URL encoding here.
              $message = urlencode('Hello '.$customer_name.','."\nYou have been succesfully registered to our services. Please login to use our services.");

              //Define route 
              $route = "4";
              //Prepare you post parameters
              $postData = array(
                  'authkey' => $authKey,
                  'mobiles' => $mobileNumber,
                  'message' => $message,
                  'sender' => $senderId,
                  'route' => $route
              );

              //API URL
              $url="https://control.msg91.com/api/sendhttp.php";

              // init the resource
              $ch = curl_init();
              curl_setopt_array($ch, array(
                  CURLOPT_URL => $url,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_POST => true,
                  CURLOPT_POSTFIELDS => $postData
                  //,CURLOPT_FOLLOWLOCATION => true
              ));


              //Ignore SSL certificate verification
              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


              //get response
              $output = curl_exec($ch);

              //Print error if any
              if(curl_errno($ch))
              {
                  echo 'error:' . curl_error($ch);
              }

              curl_close($ch);

              echo $output;

          /*-----------end of Successful Registartion Confirmation Message-----------*/

        return $user;
    }







     public function check_email(Request $request) {

      $email = DB::table('users')
                  ->where('email', '=', $request->email)
                  ->get();

      if( count($email) > 0 ) {
        echo 1;
      } else {
        echo 2;
      }

    }


      public function check_phone(Request $request) {

      $phone = DB::table('users')
                  ->where('phone', '=', $request->phone)
                  ->get();

      if( count($phone) > 0 ) {
        echo 1;
      } else {
        echo 2;
      }


    }


    public function sendOtpToPhone(Request $request) {

      $otp = mt_rand(111111,666666);
      
      $phone = $request->phone;
      $first_name = $request->first_name;
      $name = $request->name;
      $email = $request->email;
      $address = $request->address;
      $user_locality = $request->user_locality;
      $password = Hash::make($request->password);
      $this->sendTheOtp($first_name, $phone, $otp);

      User::create(
        [
          'name' => $name,
          'email' => $email,
          'phone' => $phone,
          'address' => $address,
          'user_locality' => $user_locality,
          'password' => $password,
          'otp' => md5($otp)
        ]);

    }

    public function verifyOtp(Request $request) {

      $phone = $request->phone;
      $name = $request->name;
      $email = $request->email;
      $address = $request->address;
      $user_locality = $request->user_locality;
      $otp_entered = $request->otp_entered;
      $password = Hash::make($request->password);

      $user = DB::table('users')->select('otp')->where('email', '=', $email)->first();
      $otp = $user->otp;
      if( md5($otp_entered) !== $otp ) {
        echo "wrong";
      } else {
        echo "right";
      }

      DB::table('users')
          ->where('email', '=' , $email)
          ->update([
            'status'      => 1,
            'otp'         => null,
      ]);

    }

 public function liveSearch(Request $request) {

        $name = $request->name;

        $toSearch = $name . '%';

        $dataString = "SELECT drug.brand_name, drug.generic_name, drug_category.category_name 

          FROM drug INNER JOIN drug_category

          ON drug_category.drug_category_id = drug.drug_category_id

          WHERE drug.brand_name LIKE '$toSearch'

          OR

          drug.generic_name LIKE '$toSearch'";

        $drugDetails = DB::select( DB::raw($dataString) );

        echo json_encode($drugDetails);
    }


}
