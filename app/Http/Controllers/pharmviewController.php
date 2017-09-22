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
      		
      		$medname = $request->medname;
      		$quantity = $request->quantity;
      		$price = $request->price;
      		$amount = $request->price;
    		DB::table('orders')
            ->where('order_id', 42)
            ->update(['drug_name' => $medname, 'quantity' => $quantity, 'price' => $price, 'amount'=>$amount]);
            return view('pharmview');
      
    }
}
