<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use PDF;
use DB;

class InvoiceCreator extends Controller
{
    public function index(){

      // $drugs = UserDetail::all();
      $stores = DB::table('medical_store')
      ->where('store_id','=','ad@gmai.com')->get();

      $drugs = DB::table('orders')
      ->join('users', 'users.id', '=', 'orders.cust_id')
      ->where('orders.id','=','42')->get();

      return view('invoice1', ['drugs' => $drugs, 'stores' => $stores ]);
    }


    public function downloadPDF($id){
      $drug = Order::find($id);
      // $user = User::find($id);
      // $store = UserDetail::find($store_name);

      $pdf = PDF::loadView('pdfpage', compact('drug'));
      // return $pdf;
      // return response()->file($pdf);
      $filename = "invoice"."$id".".pdf";
      return $pdf->download("$filename");

    }
}
