<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InventoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    

    public function loadform()
    {
    	return view('druginventory');
    }

    public function submitform(request $request)
    {
    	$this->validate($request,[
    			'brandname' => 'required|AlphaNum|min:3|max:50',
    			'genericname' => 'required|string|min:3|max:50',
    			'price' => 'required|regex:/^\d*(\.\d{2})?$/',
    			
    			'manufacturer' => 'required|Alpha|min:3|max:20',
    			'exp_date' => 'required',
    			'mfg_date' => 'required',
    			'dosage' => 'required|AlphaNum|Between:3,5',
    			'type' =>'required',
    		],[
    			'brandname.required' => ' The Brand name field is required.',
                'brandname.Alpha' => ' The Brand name must be a String.',
    			
    			'genericname.max' => ' The Generic Name should not exceed 35 characters.',
                'genericname.min' => ' The Generic Name must be atleast 3 characters.',
                'dosage.AlphaNum.Between'  => ' The dosage must be in numbers',

    			
    		]);


    	

    	$generic_name = $request->get('genericname'); 

    	$price        = $request->get('price');
    	
    	$manufacturer = $request->get('manufacturer');

    	$exp_date     = $request->get('exp_date');
    	$mfg_date     = $request->get('mfg_date');
    	$dosage       = $request->get('dosage');
    	$type         = $request->get('type');
    	$data = array('brand_name' =>$brand_name,'generic_name' =>$generic_name, 'price' =>$price,
                        'manufacturer'=>$manufacturer, 'exp_date'=>$exp_date,
    	 			  'mfg_date'=>$mfg_date, 'dosage'=>$dosage, 'type'=>$type);
       
        DB::table('drug')->insert($data);


        

    	

        // return back()-> with('success','Drug detail added Successfully!');

        return redirect('/Drugdetail')->with('success', 'Drug detail added Successfully!');
    }
}
