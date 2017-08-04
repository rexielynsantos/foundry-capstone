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

}
