<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class pharmController extends Controller
{
    
    public function index()
    {
      //$data['data'] = DB::table('orders')->get();
      $data['data'] = DB::table('orders')->where('status', 0)->simplePaginate(5);

      if (count($data) > 0) 
      {
        return view('pharmhome', $data);
      }
      else{

            return view('pharmname');
      }
        
    }

    
}
