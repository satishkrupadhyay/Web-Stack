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
      		
      		$medname = $request=> 'medname';
      		return $medname;

      		//collect($request->medname)->each(function($medname){
      		//var_dump($medname);
      			//$string = implode(',', $medname);
      			//$string .= $medname.',';
      			//return($string);
      		//});
      
    }
}
