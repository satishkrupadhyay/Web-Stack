<?php

namespace Jivoni\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use DB;
use Auth; 
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function mail(Request $request)
    {

    //   $contactEmail = $req->input('email'); 
        $usr_email = $request->get('usr_email');
      //  $Data = array('emaily' => $contactEmail);
        $data = array('name'=>"Our Code World");
        // Path or name to the blade template to be rendered
        $template_path = 'email';
        //$toadd = '{{ Auth::user()->email }}';


        Mail::send(['text'=> $template_path ], array('email' => $request->get('email')), function($message) use ($request)
{
   // $message->from('imdadul@simplisticsolutions.in','Admin')->to($request->get('email'))->subject('Order Placed');


    $message->to($request->get('email'), 'Receiver Name')->subject('Order Placed');

    //$message->to($usr_email, 'Receiver Name')->subject('Registration successful');

            // Set the sender
            $message->from('imdadul@simplisticsolutions.in','Greetings');
});

        return redirect('file')->with('status','Your prescription has been uploaded. Please wait till we send you the detail.');
    }

     public function getCustProfile() {

        $cust_id= Auth::user()->id;

        $custData = DB::table('users')
                        ->where('id', '=', $cust_id)
                        ->first();

        if( count($custData) > 0 ) {    
            return view('customer.custprofile', ['custData' => $custData]);
        } else {
            $custData = null;
            return view('customer.custprofile', ['custData' => $custData]);
        }
    }


    public function postCustProfile(Request $request) {

        $cust_id= Auth::user()->id;
        //dd($request->dob);

       //dd(date('Y-m-d', strtotime($request->dob)));


        DB::table('users')
          ->where('id', '=' , $cust_id)
          ->update([
              'name'   => $request->name,
              'email'   => $request->email,
              'phone'  => $request->phone,
              'dob'        => date('Y-m-d', strtotime($request->dob)),
              'gender'      => $request->gender,
              'address'      => $request->address,
              'user_locality'      => $request->user_locality,
        ]);


          return redirect()
            ->route('view.cust.profile')
          ->with('success_edit' , 'Profile details updated successfully');

    }

     public function getCustChangePass() {

        $cust_id= Auth::user()->id;

        return view('customer.custchangepass');
    }


     public function postCustChangePass(Request $request) {

        $cust_id= Auth::user()->id;

        $custDetails = DB::table('users')
                            ->where('id', '=', $cust_id)
                            ->first();

        $old_entered = $request->old_password;
        $new_entered = $request->new_password;
        $con_entered = $request->con_password;
        $checkFlag = false;


        if( $con_entered != $new_entered ) { 

            //checking if password and confirm password field match
            $checkFlag = true;
           

        } 

        if( !Hash::check($old_entered, $custDetails->password) ) {

            //checking if entered old password matches the password stored in database
            $checkFlag = true;

        } 

        if( $checkFlag ) {

            return redirect()->back()->with([
                'message_1' => 'Your new password does not match your confirm password',
                'message_2' => 'You entered the wrong password'
            ]);

        } else {

            //allowing user to change password
            DB::table('users')
              ->where('id', '=' , $cust_id)
              ->update([
                  'password'   => bcrypt($new_entered),
            ]);

              return redirect()
                      ->route('view.cust.changepass')
                      ->with('message' , 'Password changed successfully');


        }
    }   




    



}
