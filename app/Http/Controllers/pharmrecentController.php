<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class pharmrecentController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth:admin');
    }
  
     public function viewrecent()
    {
        $data['data'] = DB::table('orders')
        ->leftjoin('users', 'orders.cust_id', '=', 'users.id')
        ->where('status', 1)->simplePaginate(3);

              if (count($data) > 0) 
              {
                return view('auth.pharmrecent', $data);
              }
              else{

                    return view('auth.dashboard');
              }
    }
}
