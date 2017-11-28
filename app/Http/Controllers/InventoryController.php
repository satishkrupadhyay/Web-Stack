<?php


namespace Jivoni\Http\Controllers;
use Auth;

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
    			'brandname' => 'required|min:3|max:50|regex:/^[\s\w-]*$/',
    			'genericname' => 'required|min:3|max:50|regex:/^[\s\w-]*$/',
    			'price' => 'required',
    			
    			'manufacturer' => 'required|min:3|max:20|regex:/^[\s\w-]*$/',
    			/*'exp_date' => 'required|date',
    			'mfg_date' => 'required|date',*/
    			'strength' => 'required',
    			'type' =>'required',
    		],[
    			'brandname.required' => ' The Brand name field is required',
                
                'brandname.regex'    => 'Special characters like ( !, @, #, $, %, ^, &, *, (), +, =  ) are not allowed',
                'genericname.regex'  => 'Special characters like ( !, @, #, $, %, ^, &, *, (), +, =  ) are not allowed',
                'price.regex' => 'Price must be in format: 12.36',
                'manufacturer.regex' => 'Special characters like ( !, @, #, $, %, ^, &, *, (), +, =  ) are not allowed',
    			
    			'genericname.max' => ' The Generic Name should not exceed 50 characters.',
                'genericname.min' => ' The Generic Name must be atleast 3 characters.',
                'strength.regex'  => ' The dosage must be between: e.g. 1 - 10000.',
                
    		]);


    	
        $pharmacy_id = $request->get('pharmacy_id');
    	$generic_name = $request->get('genericname'); 
        $brand_name   = $request->get('brandname');
    	$price        = $request->get('price');
    	
    	$manufacturer = $request->get('manufacturer');

    	/*$exp_date     = $request->get('exp_date');
    	$mfg_date     = $request->get('mfg_date');*/
    	$strength     = $request->get('strength');
        $strength_unit= $request->get('strength_unit');
        $new_strength     = $strength."".$strength_unit;
    	$type         = $request->get('type');
    	$data = array('pharmacy_id' =>$pharmacy_id,'brand_name' =>$brand_name,'generic_name' =>$generic_name, 'price' =>$price,'manufacturer'=>$manufacturer, 'dosage'=>$new_strength, 'type'=>$type);
       
        DB::table('drug')->insert($data);

        // return back()-> with('success','Drug detail added Successfully!');

        return redirect('/Drugdetail')->with('success', 'Drug detail added Successfully!');
    }

    public function viewdetail()
    {   
        $pharmacy_id = Auth::user()->id;
        $data['data'] = DB::table('drug')->where('pharmacy_id',$pharmacy_id)->simplePaginate(3);

              if (count($data) > 0) 
              {
                return view('drugdetail', $data);
              }     
              else{
                    return view('auth.dashboard');
              }
    }
}
