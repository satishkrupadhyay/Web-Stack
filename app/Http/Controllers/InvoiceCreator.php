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
            $mailid=$value->email;
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


      return $pdf->stream("$filename");

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
            $mailid=$value->email;
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
            

      return redirect()->back();
      return Redirect::to('home');
    //  return view('auth.dashboard');

    }




}
