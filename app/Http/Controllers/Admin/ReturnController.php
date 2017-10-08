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

  public function receive(Request $request)
  {
    $rec = DB::table('tblreceivepurchase')
          ->leftjoin('tblpurchase', 'tblpurchase.strPurchaseID', 'tblreceivepurchase.strPurchaseID')
          ->leftjoin('tblsupplier', 'tblsupplier.strSupplierID', 'tblpurchase.strSupplierID')
          ->where('tblpurchase.strSupplierID', $request->input('supplier_id'))
          ->get();

    // dd($rec);

    return Response::json($rec);
  }

  public function receiveInfos(Request $request)
  {
    $receive = DB::table('tblreceivepurchase')
              ->leftjoin('tblreceivepurchasedetail', 'tblreceivepurchasedetail.strReceivePurchaseID', 'tblreceivepurchase.strReceivePurchaseID')
              ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblreceivepurchasedetail.strMaterialID')
              ->where('tblreceivepurchase.strReceivePurchaseID', $request->input('receive_id'))
              ->get();

    return Response::json($receive);
  }

  public function addReturn(Request $request)
  {
    $id = $id = str_random(10);
    DB::table('tblreturnheader')->insert([
      'strReturnID' => $id,
      'strSupplierID' => $request->supplier_id,
      'strReceivePurchaseID' => $request->receive_id,
      'dateReturned' => $request->return_date
    ]);


    DB::table('tblreturnmaterial')->insert([
      'strReturnID' => $id,
      'strReceivePurchaseID' => $request->receive_id,
      'created_at' => $request->created_at
    ]);
    
    foreach($request->input('mat_id') as $material){
      DB::table('tblreturndetail')->insert([
        'strReturnID' => $id,
        'strMaterialID' => $material,
        'strReceivePurchaseID' => $request->receive_id,
        'dateReturned' => $request->return_date,
        'isActive' => 1
      ]);
    }


  }

}
