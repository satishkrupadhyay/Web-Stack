<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use PDF;
use DB;

class InvoiceCreator extends Controller
{
    public function index($ord_id){

      // $drugs = UserDetail::all();

      $id=$ord_id;
      $stores = DB::table('medical_store')
      ->where('store_id','=','pharmacy@gmail.com')->get();



      


      $drugs = DB::table('orders')


      ->join('users', 'users.id', '=', 'orders.cust_id')


      ->where('order_id','=',$id)->get();

     

      return view('invoice1', ['drugs' => $drugs, 'stores' => $stores ]);
    }


    public function downloadPDF($ord_id){

      $id2=$ord_id;

      $drug = DB::table('orders')


      ->join('users', 'users.id', '=', 'orders.cust_id')


      ->where('order_id','=',$id2)->get();
      //$drug = Order::find($ord_id);
      // $user = User::find($id);
      // $store = UserDetail::find($store_name);


      $stores = DB::table('medical_store')
      ->where('store_id','=','pharmacy@gmail.com')->get();

      $pdf = PDF::loadView('pdfpage', compact('drug','stores'));
      $pdf->setPaper('A4', 'portrait');
      // return $pdf;
      // return response()->file($pdf);
      $filename = "invoice"."$id2".".pdf";

      return $pdf->stream("$filename");

    }
}
