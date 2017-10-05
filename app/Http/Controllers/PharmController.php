<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class pharmController extends Controller
{
    

    public function viewlogin()
    {
        return view('auth.pharmlogin');
    }

    public function viewdashboard()
    {
        return view('auth.dashboard');
    }

    public function handlelogin(Request $req)
    {
        $user = $req->input('email');
        $pass = $req->input('password');
        // echo $user."-->".$pass;
        $checklogin = DB::table('medical_store')->where(['store_id'=> $user, 'password'=> $pass])->get();

       /* $data = $request->only('email', 'password');
        if(\Auth::attempt($data)){
            return redirect()->intended('dashboard');

        }

        return back()->withInput();*/

        if(count($checklogin) > 0)
        {
           // return view('/auth/dashboard');
            return $this->viewpage();
            // echo "Login Success!";
        }
        else
        {
            echo "Wrong Data!!";
        }
        //return view('auth.pharmlogin');
        
    }


    public function viewpage()
    {
        $data['data'] = DB::table('orders')
        ->leftjoin('users', 'orders.cust_id', '=', 'users.id')
        ->where('status', 0)->simplePaginate(3);

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
