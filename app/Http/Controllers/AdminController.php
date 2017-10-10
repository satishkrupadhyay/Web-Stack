<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.dashboard');
    }


    public function viewpage()
    {
        $data['data'] = DB::table('orders')
        ->leftjoin('users', 'orders.cust_id', '=', 'users.id')
        ->where('status', 0)->simplePaginate(5);

        $count['count'] = DB::select( DB::raw("SELECT count(*) as cnt FROM orders WHERE status = '0'") );

              if (count($data) > 0) 
              {
                return view('auth.dashboard', $data, $count);
              }
              else{

                    return view('auth.dashboard');
              }
    }


    
    



}
