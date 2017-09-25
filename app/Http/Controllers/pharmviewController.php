<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class pharmviewController extends Controller
{
    public function index()
    {
      

            return view('pharmview');
      
    }

    public function update(request $request)
    {
      		
      	
      		$medname1 = $request->medname2;

      		$quantity1 = $request->quantity2;
      		$price1 = $request->price2;
      		$amount1 = $request->total;
      		$date_of_delivery = date('Y-m-d H:i:s');
    		DB::table('orders')
            ->where('order_id', 42)
            ->update(['drug_name' => $medname1, 'quantity' => $quantity1, 'price' => $price1, 'amount'=>$amount1, 'date_of_delivery'=>$date_of_delivery]);
            return view('pharmview');



      		//collect($request->medname)->each(function($medname){
      		//var_dump($medname);
      			//$string = implode(',', $medname);
      			//$string .= $medname.',';
      			//return($string);
      		//});
      	
      
    }
}
