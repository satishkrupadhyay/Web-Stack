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

<<<<<<< HEAD
      $drugs = DB::table('orders')
      ->join('users', 'users.id', '=', 'orders.cust_id')
      ->where('orders.id','=','42')->get();
=======

      $drugs = DB::table('orders')


      ->join('users', 'users.id', '=', 'orders.cust_id')

      ->where('order_id','=','42')->get();
>>>>>>> 4429e995d2fc5693bca8e803abd68728ed04cd03

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
