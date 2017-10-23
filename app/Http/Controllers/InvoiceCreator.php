<?php

namespace Jivoni\Http\Controllers;

use Illuminate\Http\Request;
use Jivoni\Order;
use PDF;
use DB;
use Mail;
use Illuminate\Support\Facades\Input;

class InvoiceCreator extends Controller
{
    public function index($ord_id){

      // $drugs = UserDetail::all();

      $id=$ord_id;
      $stores = DB::table('admins')
      ->where('store_email','=','pharmacy@gmail.com')->get();



      


      $drugs = DB::table('orders')


      ->join('users', 'users.id', '=', 'orders.cust_id')


      ->where('order_id','=',$id)->get();

     

      return view('invoice1', ['drugs' => $drugs, 'stores' => $stores ]);
    }


    public function downloadPDF($ord_id){

      $id2=$ord_id;

      $drug = DB::table('orders')

      ->join('users', 'users.id', '=', 'orders.cust_id')


      ->where('order_id','=',$id2)->get();
      //$drug = Order::find($ord_id);
      // $user = User::find($id);
      // $store = UserDetail::find($store_name);
foreach ($drug as $value) {
            $mailid         = $value->email;
            $customer_name  = $value->name;
            $invoice_amount = $value->amount;
            $mobileNumber   = $value->phone;
        //  $invoice_no
            # code...
          }


      $stores = DB::table('admins')
      ->where('store_email','=','pharmacy@gmail.com')->get();

      $filename = "invoice"."$id2".".pdf";
      $pdf = PDF::loadView('pdfpage', compact('drug','stores'))->save('prescription_file/'.$filename);
      $pdf->setPaper('A4', 'portrait');
      // return $pdf;
      // return response()->file($pdf);
      DB::table('orders')
            ->where('order_id', $ord_id )
            ->update(['file' =>$filename]);



      $template_path = 'dispatch';
          Mail::send(['text'=> $template_path ], array('email' => Input::get('email')), function($message) use ($mailid, $pdf, $filename)
          {
             // $message->from('imdadul@simplisticsolutions.in','Admin')->to($request->get('email'))->subject('Order Placed');

             // $message->to($request->get('email'), 'Receiver Name')->subject('Order Placed');

              $message->to($mailid, 'Receiver Name')->subject('Order Dispatched');

                      // Set the sender
                      $message->from('satish@simplisticsolutions.in','Greetings');

                      $message->attachData($pdf->output(),$filename);
          });

           /*------------Order Confirmation Message---------------*/

              $authKey = "179537A8dc5PRixK59e43aea";

              //Multiple mobiles numbers separated by comma
              
              
              //Sender ID,While using route4 sender id should be 6 characters long.
              $senderId = "Jivoni";

              //Your message to send, Add URL encoding here.
              $message = urlencode('Hello '.$customer_name.','."\nYour order has been dispatched by us. Please pay by cash to the delivery person when you receive your medicines."."\nYour Invoice "." $filename" ." for\n Rs."."$invoice_amount");

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

          /*-----------end of Order Confirmation Message-----------*/


      return $pdf->stream("$filename");
      //return redirect('/admin');

    }

    public function cancelorder($ord_id){

      $id2=$ord_id;

      $drug = DB::table('orders')


      ->join('users', 'users.id', '=', 'orders.cust_id')


      ->where('order_id','=',$id2)->get();
      //$drug = Order::find($ord_id);
      // $user = User::find($id);
      // $store = UserDetail::find($store_name);
foreach ($drug as $value) {
            $mailid        = $value->email;
            $customer_name = $value->name;

            $mobileNumber   = $value->phone;
            # code...
          
}

      $template_path = 'cancel';
          Mail::send(['text'=> $template_path ], array('email' => Input::get('email')), function($message) use ($mailid)
          {
             // $message->from('imdadul@simplisticsolutions.in','Admin')->to($request->get('email'))->subject('Order Placed');

             // $message->to($request->get('email'), 'Receiver Name')->subject('Order Placed');

              $message->to($mailid, 'Receiver Name')->subject('Order Cancelled');

                      // Set the sender
                      $message->from('satish@simplisticsolutions.in','Greetings');

                      
          });
$status=2;
          DB::table('orders')
            ->where('order_id', $ord_id )
            ->update(['status' =>$status]);
            
            /*------------Cancel Confirmation Message---------------*/

              $authKey = "179537A8dc5PRixK59e43aea";

              //Multiple mobiles numbers separated by comma
              
              
              //Sender ID,While using route4 sender id should be 6 characters long.
              $senderId = "Jivoni";

              //Your message to send, Add URL encoding here.
              $message = urlencode('Hello '.$customer_name.','."\nWe are sorry to inform that the medicines you ordered are currently not available. We regret to inform you that your order has been cancelled."."\nBut do soon check with us again for availability.");

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

          /*-----------end of Cancel Confirmation Message-----------*/


      //return redirect()->back();
      return redirect('/admin');
    //  return view('auth.dashboard');

    }




}
