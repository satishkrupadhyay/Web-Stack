<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use DB;
use Auth;
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
        $loc = Auth::user()->locality;
        $pharmacy_id = Auth::user()->id;

        //$dat = DB::table('admins')->where('store_email', $pemail)->pluck('locality');

        $data['data'] = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.cust_id')
        ->where('status', 0)
        ->where('user_locality', '=', $loc)
        ->simplePaginate(5);
        
        $count['count'] = DB::select( DB::raw("SELECT count(*) as cnt FROM orders WHERE status = '0' AND pharmacy_id=$pharmacy_id") );
              if (count($data) > 0) 
              {
                return view('auth.dashboard', $data, $count);
              }
              else{
                    return view('auth.dashboard');
              }
    }
    
    
}