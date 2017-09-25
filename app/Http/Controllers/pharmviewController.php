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
      		
      	
      		$medname1 = $request['medname1'];

      		$quantity1 = $request['quantity1'];
      		$price1 = $request['price1'];
      		$amount1 = $request['price1'];
    		DB::table('orders')
            ->where('order_id', 42)
            ->update(['drug_name' => $medname1, 'quantity' => $quantity1, 'price' => $price1, 'amount'=>$amount1]);
            return view('pharmview');


      		//collect($request->medname)->each(function($medname){
      		//var_dump($medname);
      			//$string = implode(',', $medname);
      			//$string .= $medname.',';
      			//return($string);
      		//});
      	
      
    }
}
