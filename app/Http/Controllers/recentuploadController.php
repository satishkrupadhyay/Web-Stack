<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;


class recentuploadController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
       
    }

    public function recentupload()
    { 
      $usr_id = Auth::user()->id;

        $data['data'] = DB::table('orders')->where([['cust_id', $usr_id],['status', 0]])->simplePaginate(3);
        
        //$data['data'] = DB::select( DB::raw("SELECT * FROM orders WHERE cust_id = '$usr_id' AND status='1'") );

              if (count($data) > 0) 
              {
                return view('recentupload', $data);
              }
              else{

                    return view('home');
              }
    }

    public function cancelorder($o_id)
    { 
        DB::table('orders')
            ->where('order_id', $o_id )
            ->update(['status' => 4]);
        return back()-> with('success','Order has been Canceled.');
    }

}
