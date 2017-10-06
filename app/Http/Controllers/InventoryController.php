<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InventoryController extends Controller
{
    public function loadform()
    {
    	return view('druginventory');
    }

    public function submitform(request $request)
    {
    	$this->validate($request,[
    			'brandname' => 'required|min:3|max:50',
    			'genericname' => 'required|min:3|max:50',
    			/*'price' => 'required|email|unique:users',
    			'quantity' => 'required|numeric',
    			'manufacturer' => 'required|min:3|max:20',
    			'exp_date' => 'required|min:3|max:20|same:password',
    			'mfg_date' => 'required'
    			'dosage' => 'required'
    			'type' =>'required'*/
    		],[
    			'brandname.required' => ' The Brand name field is required.',
    			/*'firstname.min' => ' The first name must be at least 5 characters.',*/
    			'brandname.max' => ' The brand nujiso name may not be greater than 35 characters.',
    			/*'lastname.required' => ' The last name field is required.',
    			'lastname.min' => ' The last name must be at least 5 characters.',
    			'lastname.max' => ' The last name may not be greater than 35 characters.',*/
    		]);


    	$brand_name   = $request->get('brandname'); 
    	$generic_name = $request->get('genericname'); 
    	$price        = $request->get('price');
    	$quantity     = $request->get('quantity');
    	$manufacturer = $request->get('manufacturer');
    	$exp_date     = $request->get('exp_date');
    	$mfg_date     = $request->get('mfg_date');
    	$dosage       = $request->get('dosage');
    	$type         = $request->get('type');
    	$data = array('brand_name' =>$brand_name,'generic_name' =>$generic_name, 'price' =>$price,
    	 			  'quantity' =>$quantity, 'manufacturer'=>$manufacturer, 'exp_date'=>$exp_date,
    	 			  'mfg_date'=>$mfg_date, 'dosage'=>$dosage, 'type'=>$type);
       
        DB::table('drug')->insert($data);


        

    	

        // return back()-> with('success','Drug detail added Successfully!');

        return redirect('/inventory')->with('success', 'Drug detail added Successfully!');
    }
}
