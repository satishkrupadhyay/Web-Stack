<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
//use App\Http\Request;
//use App\file;
use Illuminate\Support\Facades\Input;
use Mail;

class FileController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
       
    }

    public function index()
   {
    return view('upload.upload');
   }

    

    public function storeFile(request $request)
    {
       //$contactEmail = $req->input('email'); 
        $usr_email = $request->get('usr_email');
      //  $Data = array('emaily' => $contactEmail);
        $data = array('name'=>"Our Code World");
        // Path or name to the blade template to be rendered
        $template_path = 'email';
        //$toadd = '{{ Auth::user()->email }}';


      $user_id = $request->usr_id;
      //image validate
      $this->validate($request,['image'=>'required|image|mimes:jpeg,jpg,png|max:2048',]);

    	if ($request->hasFile('image')) {
   		
   		  $imageName= time().'.'.$request->image->getClientOriginalExtension();
        //$orderDate = date();
        $request->image->move(base_path() . '/public/pres' ,$imageName);
   			//$filename = $request->image->getClientOriginalName();
        //$request->image->storeAs('upload',$imageName);

        $data = array('image' =>$imageName,'cust_id' =>$user_id);
        DB::table('orders')->insert($data);

        Mail::send(['text'=> $template_path ], array('email' => $request->get('email')), function($message) use ($usr_email)
{
   // $message->from('imdadul@simplisticsolutions.in','Admin')->to($request->get('email'))->subject('Order Placed');

   // $message->to($request->get('email'), 'Receiver Name')->subject('Order Placed');

    $message->to($usr_email, 'Receiver Name')->subject('Order Placed');

            // Set the sender


            $message->from('satish@simplisticsolutions.in','Greetings');

});

    		
   			return back()
                -> with('success','Image Uploaded Successfully. Please check you email for details')
                -> with('path',$imageName);


   		 }else{
       			return 'No file selected';
       			}

    }

    
}
