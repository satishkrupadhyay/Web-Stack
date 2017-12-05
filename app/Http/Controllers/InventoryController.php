<?php


namespace Jivoni\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use DB;
use Hash;

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

        
        $new_strength     = $strength." ".$strength_unit;
    	$type         = $request->get('type');
    	$data = array('pharmacy_id' =>$pharmacy_id,'brand_name' =>$brand_name,'generic_name' =>$generic_name, 'price' =>$price,'manufacturer'=>$manufacturer, 'dosage'=>$new_strength, 'type'=>$type);
       
        DB::table('drug')->insert($data);

        // return back()-> with('success','Drug detail added Successfully!');

        return redirect('/Drugdetail')->with('success', 'Drug detail added Successfully!');
    }

    public function viewdetail()
    {   
        $pharmacy_id = Auth::user()->id;
        $data = DB::table('drug')->where('pharmacy_id',$pharmacy_id)->get();

              if (count($data) > 0) 
              {

                return view('drugdetail')->with('data', $data);

              }     
              else{
                    return view('auth.dashboard');
              }
    }


    public function editDrugs() {

        if( isset($_GET['id']) && !empty($_GET['id']) ) {

            $id = $_GET['id'];
        }


        $data = DB::table('drug')
            ->where('drug_id', '=' , $id)
            ->first();

        
        echo json_encode($data);


    }


    public function submiteditDrugs(Request $request) {

        $pharmacy_id = Auth::user()->id;

        $drug_id = $request->drug_id;
        $brand_name = $request->brandname;
        $generic_name = $request->genericname;
        $price = $request->price;
        $manufacturer = $request->manufacturer;
        $type = $request->type;
        $dosage = $request->strength . ' ' . $request->strength_unit;

        DB::table('drug')
            ->where('drug_id', '=', $drug_id)
            ->update([
                'brand_name'    => $brand_name,
                'generic_name'  => $generic_name,
                'price'         => $price,
                'manufacturer'  => $manufacturer,
                'type'          => $type,
                'dosage'        => $dosage,
            ]);

        // $response = [

        //   $brand_name, $generic_name, $price, $manufacturer, $dosage, $type, '<a href="" class="btn btn-primary edit" id="entry-'.$drug_id.'">Edit</a>',

        // ];


            echo "Drug details updated successfully";
        //Session::flash('edit_success', 'Drug details successfully updated');
        //echo json_encode($response);
    }   


    public function getPharmProfile() {

        $pharmacy_id= Auth::user()->id;

        $pharmData = DB::table('admins')
                        ->where('id', '=', $pharmacy_id)
                        ->first();

        if( count($pharmData) > 0 ) {    
            return view('auth.pharmprofile', ['pharmData' => $pharmData]);
        } else {
            $pharmData = null;
            return view('auth.pharmprofile', ['pharmData' => $pharmData]);
        }
    }


    public function postPharmProfile(Request $request) {

        $pharmacy_id= Auth::user()->id;

        DB::table('admins')
          ->where('id', '=' , $pharmacy_id)
          ->update([
              'store_name'   => $request->store_name,
              'owner_name'   => $request->owner_name,
              'store_email'  => $request->store_email,
              'phone'        => $request->phone,
              'address'      => $request->address,
              'locality'     => $request->locality,
        ]);


          return redirect()
            ->route('view.pharm.profile')
          ->with('success_edit' , 'Profile details updated successfully');

    }

    public function getPharmChangePass() {

        $pharmacy_id= Auth::user()->id;


            
        return view('auth.pharmchangepass');
    }


    public function postPharmChangePass(Request $request) {

        $pharmacy_id= Auth::user()->id;

        $pharmDetails = DB::table('admins')
                            ->where('id', '=', $pharmacy_id)
                            ->first();

        $old_entered = $request->old_password;
        $new_entered = $request->new_password;
        $con_entered = $request->con_password;
        $checkFlag = false;


        if( $con_entered != $new_entered ) { 

            //checking if password and confirm password field match
            $checkFlag = true;
           

        } 

        if( !Hash::check($old_entered, $pharmDetails->password) ) {

            //checking if entered old password matches the password stored in database
            $checkFlag = true;

        } 

        if( $checkFlag ) {

            return redirect()->back()->with([
                'message_1' => 'Your new password does not match your confirm password',
                'message_2' => 'You entered the wrong password'
            ]);

        } else {

            //allowing user to change password
            DB::table('admins')
              ->where('id', '=' , $pharmacy_id)
              ->update([
                  'password'   => bcrypt($new_entered),
            ]);

              return redirect()
                      ->route('view.pharm.changepass')
                      ->with('message' , 'Password changed successfully');


        }
    }   

    public function searchBrand(Request $request) {

        $brand_name = $request->brand_name;

        $toSearch = $brand_name . '%';

        $dataString = "SELECT brand_name

        FROM drug 

        WHERE brand_name LIKE '$toSearch'";

        $drugDetails = DB::select( DB::raw($dataString) );

        if( count($drugDetails) > 0 ) {

        ?>

        <ul class="list">
        <?php
        foreach($drugDetails as $dd) {
        ?>
        <li class="listTitle result" onClick="selectBrand('<?php echo $dd->brand_name; ?>');"><?php echo $dd->brand_name; ?></li>
        <?php } ?>
        </ul>

        <?php
        } else {
            echo "No suggestions found";
        }
    }



    public function searchGeneric(Request $request) {

        $generic_name = $request->generic_name;

        $toSearch = $generic_name . '%';

        $dataString = "SELECT generic_name

        FROM drug 

        WHERE generic_name LIKE '$toSearch'";

        $drugDetails = DB::select( DB::raw($dataString) );

        if( count($drugDetails) > 0 ) {

        ?>

        <ul class="list">
        <?php
        foreach($drugDetails as $dd) {
        ?>
        <li class="listTitle result" onClick="selectGeneric('<?php echo $dd->generic_name; ?>');"><?php echo $dd->generic_name; ?></li>
        <?php } ?>
        </ul>

        <?php
        } else {
            echo "No suggestions found";
        }
    }


    public function searchManufacturer(Request $request) {

        $manufacturer = $request->manufacturer;

        $toSearch = $manufacturer . '%';

        $dataString = "SELECT manufacturer

        FROM drug 

        WHERE manufacturer LIKE '$toSearch'";

        $drugDetails = DB::select( DB::raw($dataString) );

        if( count($drugDetails) > 0 ) {

        ?>

        <ul class="list">
        <?php
        foreach($drugDetails as $dd) {
        ?>
        <li class="listTitle result" onClick="selectManufacturer('<?php echo $dd->manufacturer; ?>');"><?php echo $dd->manufacturer; ?></li>
        <?php } ?>
        </ul>

        <?php
        } else {
            echo "No suggestions found";
        }
    }


    
}
