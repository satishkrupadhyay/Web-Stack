<?php

namespace Jivoni\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Routing\Middleware\CheckUser; 
class PharmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewlogin()
    {
        return view('auth.pharmlogin');
    }

    public function viewdashboard()
    {
        return view('auth.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            return view('/auth/dashboard');
            // echo "Login Success!";
        }
        else
        {
            echo "Wrong Data!!";
        }
        //return view('auth.pharmlogin');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
