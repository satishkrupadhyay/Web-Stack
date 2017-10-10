<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class purchasehistoryController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
       
    }
    
    public function viewpurchase()
    {	
    	$usr_id = Auth::user()->id;

        $data['data'] = DB::table('orders')->where([['cust_id', $usr_id],['status', 1]])->simplePaginate(3);
        
        //$data['data'] = DB::select( DB::raw("SELECT * FROM orders WHERE cust_id = '$usr_id' AND status='1'") );

              if (count($data) > 0) 
              {
                return view('purchasehistory', $data);
              }
              else{

                    return view('home');
              }
    }
}
