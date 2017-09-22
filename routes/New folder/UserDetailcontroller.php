<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;
use PDF;
use DB;
class UserDetailcontroller extends Controller
{
    public function store(Request $request){

      $drug = new UserDetail([
        'drug_name' => $request->get('drug_name'),
        'price' => $request->get('price'),
        'quantity' => $request->get('quantity'),
        'amount' => $request->get('amount')
      ]);

      $drug->save();
      return redirect('/index');
    }

    public function index(){

      // $drugs = UserDetail::all();
      $drugs = DB::table('user_details')->where('id','=','6')->get();

      return view('invoice1', ['drugs' => $drugs ]);
    }

    public function downloadPDF($id){
      $drug = UserDetail::find($id);

      $pdf = PDF::loadView('pdfpage', compact('drug'));
      // return $pdf;
      // return response()->file($pdf);
      $filename = "invoice"."$id".".pdf";
      return $pdf->download("$filename");

    }
}
