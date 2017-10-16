<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Response;

class ReturnController extends Controller
{

  public function suppliers()
  {
    $supp = DB::table('tblsupplier')->where('strStatus', 'Active')->get();

    return Response::json($supp);
  }

  public function addReturn(Request $request)
  {
    dd($request->all());
    $id = str_random(10);
    DB::table('tblreturnheader')
        ->insert([
          'strReturnID' => $id,
          'strSupplierID' => $request->input('supplier_id'),
          'strReceivePurchaseID' => $request->input('receive_id'),
          'dateReturned' => $request->input('return_date')
        ]);

    DB::table('tblreturnmaterial')
        ->insert([
          'strReturnID' => $id,
          'strReceivePurchaseID' => $request->input('receive_id'),
          'created_at' => $request->input('created_at')
        ]);

    $receive = $request->input('receive_id');
    $returned = $request->input('qty_returned')
    $ct = 0
    foreach ($request->mat_id as $mat) {

      $totqty = DB::table('tblreceivepurchasedetail')
              ->where('strReceivePurchaseID', $receive[$ct])
              ->where('strMaterialID', $mat)
              ->first()
              ->quantityReceived;

      $initPurchID = DB::table('tblreceivepurchase')
              ->where('strReceivePurchaseID', $receive[$ct])
              ->first()
              ->strPurchaseID;

      $initqty = DB::table('tblpurchmatvariantdetail')
              ->where('strPurchaseID', $initPurchID)
              ->where('strMaterialID', $mat)
              ->first()
              ->totalQty;

      $updateqty = $totqty - $returned[$ct];
      $addQty =  $returned[$ct] + $initqty

//UPDATE QTY ON TABLES
      DB::table('tblreceivepurchasedetail')
              ->where('strReceivePurchaseID', $receive[$ct])
              ->where('strMaterialID', $mat)
              ->update([
                'quantityReceived' => $updateqty
              ]);

      DB::table('tblpurchmatvariantdetail')
              ->where('strPurchaseID', $receive[$ct])
              ->where('strMaterialID', $mat)
              ->update([
                'totalQty' => $addQty
              ]);
//END UPDATE QTY ON TABLES
      DB::table('tblpurchase')
              ->where('strPurchaseID', $receive[$ct])
              ->update([
                'strPStatus' => 'Partially Delivered'
              ]);

      DB::table('tblreturndetail')
          ->insert([
            'strReturnID' => $id,
            'strMaterialID' => $mat,
            'strReceivePurchaseID' => $receive[$ct],
            'quantityReturned' => $returned[$ct],
            'isActive' => 1
          ]);
      $ct = $ct + 1;
    }

  }

}
