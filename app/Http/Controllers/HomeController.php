<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use DB;

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

    


<<<<<<< HEAD

=======
>>>>>>> f19822e88ccb34ca428a94a22abb4a1232676dba
    
}
