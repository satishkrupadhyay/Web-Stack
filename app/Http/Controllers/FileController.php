<?php

namespace Jivoni\Http\Controllers;


use Illuminate\Http\Request;
use DB;
//use Jivoni\Http\Request;
//use Jivoni\file;
use Illuminate\Support\Facades\Input;
use Mail;
use Auth;

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

      $user_locality = $request->user_locality;
      //get pharmacy id based on location of order
      $pharm_data['pharm_data'] = DB::table('admins')
        ->where('locality', $user_locality)->get()->first();


      //$pharm_data = DB::select( DB::raw("SELECT id FROM admins WHERE locality = $user_locality") );
      
      foreach ($pharm_data as $value) {
                  $pharmacy_id=$value->id;
                  
                }





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
        //$date_of_purchase = date('d-m-y H:i:s');

        $data = array('image' =>$imageName,'cust_id' =>$user_id,'pharmacy_id'=>$pharmacy_id);
        DB::table('orders')->insert($data);

        Mail::send(['text'=> $template_path ], array('email' => $request->get('email')), function($message) use ($usr_email)
          {
             

              $message->to($usr_email, 'Receiver Name')->subject('Order Placed');
               // Set the sender


              $message->from('satish@simplisticsolutions.in','Greetings');

          });

    		

// Message Integration

        //Your authentication key
$authKey = "179537A8dc5PRixK59e43aea";

//Multiple mobiles numbers separated by comma
$mobileNumber = $request->user_phone;
$customer     = $request->user_name;

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "Jivoni";

//Your message to send, Add URL encoding here.
$message = urlencode('Hello '.$customer.','."\nWe thank you for your order. This is a confirmation that your order has been successfully received and is currently under process. We will let you know once your order is dispatched.");

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

//**************************************************************************************

   			return back()
                -> with('success','Image Uploaded Successfully. Please check you email for details')
                -> with('path',$imageName);


   		 }else{
       			return 'No file selected';
       			}

    }

    
}
