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
      ->where('store_id','=','ad@gmai.com')->get();

<<<<<<< HEAD
=======

      $drugs = DB::table('orders')
      ->join('users', 'users.id', '=', 'orders.cust_id')
      ->where('orders.id','=','42')->get();


>>>>>>> 2008f0706d9c91df21fe7478f68dd891f1765f89
      $drugs = DB::table('orders')


      ->join('users', 'users.id', '=', 'orders.cust_id')

<<<<<<< HEAD
      ->where('order_id','=',$id)->get();
=======
      ->where('order_id','=','42')->get();
>>>>>>> 2008f0706d9c91df21fe7478f68dd891f1765f89


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
