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
            $data['data'] = DB::table('orders')->where('status', 0)->simplePaginate(5);

      if (count($data) > 0) 
      {
        return view('auth.dashboard', $data);
      }
      else{

            return view('auth.dashboard');
      }
            // echo "Login Success!";
        }
        else
        {
            echo "Wrong Data!!";
        }
        //return view('auth.pharmlogin');
        
    }

    
}
