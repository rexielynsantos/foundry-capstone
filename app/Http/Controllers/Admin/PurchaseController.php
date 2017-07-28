<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use DB;
use Response;

class PurchaseController extends Controller
{
  public function getAllMaterial(){
      $material = Material::where('strStatus', 'Active')->get();

      return response()->json($material);
    }

	public function viewPurchase()
    {
    $purchase = Purchase::with('material.details')->get();

      // return Response::json($purchase);
      return view('Transaction.purchaseOrder')
      ->with('purchase',$purchase);
    }

  //   public function addPurchase(Request $request)
  // 	{
  //   $id = str_random(10);
  //   Purchase::insert([
  //     'strPurchaseID' => $id,
  //     'strSupplierID' => $request->input('supplier_id'),
  //     'strPaymentTermID' => $request->input('pterm_id'),
  //     'strStatus' => 'Pending'
  //   ]);

  //   if($request->input('material_data') != ''){
  //     foreach($request->input('material_data') as $mat){
  //       PurchaseDetail::insert([
  //         'strPurchaseID' => $id,
  //         'strMaterialID' => $mat,

  //       ]);
  //     }
  //   }

  //   $purchase = Purchase::with('material.details')->where('strPurchaseID', $id)->first();
  //    return $purchase;
  // }
}
