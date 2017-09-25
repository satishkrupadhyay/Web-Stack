<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
//use App\Http\Request;
//use App\file;
use Illuminate\Support\Facades\Input;


class FileController extends Controller
{

    public function index()
   {
    return view('upload.upload');
   }

    

    public function storeFile(request $request)
    {

      $user_id = $request->usr_id;
      //image validate
      $this->validate($request,['image'=>'required|image|mimes:jpeg,jpg,png|max:2048',]);

    	if ($request->hasFile('image')) {
   		
   		  $imageName= time().'.'.$request->image->getClientOriginalExtension();
        //$orderDate = date();
        $request->image->move(public_path('upload'),$imageName);
   			//$filename = $request->image->getClientOriginalName();
        //$request->image->storeAs('upload',$imageName);

        $data = array('image' =>$imageName,'cust_id' =>$user_id);
        DB::table('orders')->insert($data);

    		
   			return back()
                -> with('success','Image Uploaded Successfully.')
                -> with('path',$imageName);


   		 }else{
       			return 'No file selected';
       			}

    }
}
