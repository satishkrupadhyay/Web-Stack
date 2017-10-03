<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Route;
use DB;
use Illuminate\Http\Request;

class pharmviewController extends Controller
{
    private $var;

    public function index($order_id)
    {
            $this->var = $order_id;
            //$id =  $order_id;
            return view('pharmview', ['order_id'=> $order_id]);   
    }

    public function update(request $request)
    {
      		$ord_id = $request->ord_id;

          $medname1 = $request->medname2;
          $quantity1 = $request->quantity2;
          $price1 = $request->price2;
          $amount1 = $request->total;
          $date_of_delivery = date('Y-m-d H:i:s');
          $status = 1;
        DB::table('orders')
            ->where('order_id', $ord_id )
            ->update(['drug_name' => $medname1, 'quantity' => $quantity1, 'price' => $price1, 'amount'=>$amount1, 'date_of_delivery'=> $date_of_delivery, 'status' =>$status]);
            //return view('pharmview');
          return redirect()->action('InvoiceCreator@index',['ord_id' => $ord_id]);

            


      		//collect($request->medname)->each(function($medname){
      		//var_dump($medname);
      			//$string = implode(',', $medname);
      			//$string .= $medname.',';
      			//return($string);
      		//});
      	
      
    }
}
