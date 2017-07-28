<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Supplier;
use App\Models\Material;
use App\Models\Unit;
use App\Models\PaymentTerm;
use DB;
use Response;

class PurchaseAddController extends Controller
{
    public function viewAddPurchase()
    {
  
     $supplier = Supplier::where('strStatus', 'Active')->get();
     $paymentterm = PaymentTerm::where('strStatus', 'Active')->get();
     $material = Material::where('strStatus', 'Active')->get();
     $unit = Unit::where('strStatus', 'Active')->get();
     // $purchase = Purchase::with(['material.details'])->where('strStatus', 'Pending')->get();
     return view('Transaction.purchase-add')
     ->with('supplier', $supplier)
     ->with('matt', $material)
     ->with('paymentterm', $paymentterm)
     ->with('unit', $unit);



    }
    public function showSupplierDetails(Request $request)
    {

    $suppl = DB::table('tblsupplier')
    ->where('strSupplierName', $request->supplier_name)
    ->get();

    return Response::json($suppl);


    }
    public function GetDetails(Request $request)
    {


    $suppl = DB::table('tblsupplier')
    ->where('strSupplierID', $request->supplier_name)
    ->get();


    return Response::json($suppl);

    }
     public function addCart(Request $request)
    {

      $matt = Material::with(['unit'])->where('strMaterialName',  $request->mat_data)->get();
      return response()->json($matt);

    }
    public function addPurchaseOrder(Request $request)
    {
        $id = str_random(10);
        Purchase::insert([
          'strPurchaseID' => $id,
          'strSupplierID' => $request->input('sup_id'),
          'strPaymentTermID' => $request->input('pterm_id'),
          'strStatus' => 'Pending',
            ]);

        if($request->input('material_data') != ''){
          foreach($request->input('material_data') as $material){
            PurchaseDetail::insert([
              'strPurchaseID' => $id,
              'strMaterialID' => $material,
              'dblReorderQty' => $material,
              'dblAddlQty' => $request->input('add_qty'),
              'strUOMID' => $material,
            ]);
          }
        }

    $purchase = Purchase::with('material.details', 'unit', 'supplier', 'paymentterm')->where('strPurchaseID',$id)->first();
    return $purchase;

    }
    

}
