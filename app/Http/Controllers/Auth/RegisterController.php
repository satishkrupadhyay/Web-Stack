<?php

namespace Jivoni\Http\Controllers\Auth;

use Jivoni\User;
use Jivoni\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
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

    use RegistersUsers;

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|regex:/[0-9]{10}/',
            'user_locality' =>  'required',
        ]);
    }

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

        return $user;
    }


}
