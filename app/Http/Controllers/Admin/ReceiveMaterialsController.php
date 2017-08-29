<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
use App\Models\ReceivePurchase;
use App\Models\ReceivePurchaseDetail;
use App\Models\ReceiveMatVariantDetail;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\PurchaseDetail;
use App\Models\Material;

class ReceiveMaterialsController extends Controller
{
    public function viewReceivePurchase()
    {

     $rp =    $receivepurchase = ReceivePurchase::with(['orders.details', 'orders.materialvariant'])
     ->get();
     return view('Transaction.receivePurchase')
     ->with('rp', $rp);
    }
    public function viewReceiveAddPurchase()
    {

  	 $purchase = Purchase::with('material.details')->where('strPStatus', '=', 'Pending')
  	 	->get();


     return view('Transaction.receive-add')
     ->with('purchase', $purchase);

    }
    public function getAllMaterialVariant(){

       $matVar = DB::table('tblmaterialdetail')
        ->leftjoin('tblmaterialvariant', 'tblmaterialvariant.strMaterialVariantID', '=', 'tblmaterialdetail.strMaterialVariantID')
        ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', '=', 'tblmaterialdetail.strMaterialID')
        ->leftjoin('tbluom', 'tblmaterialvariant.strUOMID', '=', 'tbluom.strUOMID')
        ->select('tblmaterial.*','tblmaterialdetail.strMaterialID')
        ->select('tblmaterialvariant.*','tblmaterialdetail.strMaterialVariantID')
        ->select('tblmaterialvariant.*','tbluom.strUOMName')
                // ->where('tblmaterialdetail.strMaterialID', '=' , 'tblmaterial.strMaterialID')
        ->get();

      return $matVar;

    }
    public function getSupplier(Request $request)
    {
      $supplier = DB::table('tblsupplier')
                ->leftjoin('tblpurchase', 'tblpurchase.strSupplierID', '=', 'tblsupplier.strSupplierID')
                ->select('tblsupplier.*')
                ->where('tblpurchase.strPurchaseID', '=', $request->purchase_id)
                ->get();

      $material = DB::table('tblmaterial')
                ->leftjoin('tblpurchasedetail', 'tblpurchasedetail.strMaterialID', '=', 'tblmaterial.strMaterialID')
                ->select('tblmaterial.*')
                ->where('tblpurchasedetail.strPurchaseID', '=', $request->purchase_id)
                ->get();

      return Response::json(['supplier'=> $supplier, 'material' => $material]);
    }
    public function addCart(Request $request)
    {

      $matt = Material::where('strMaterialID',  $request->mats_data)->get();
      return response()->json($matt);

      // return Response::json(['matt' => $matt]);


      // return Response::json(['supplier'=> $supplier]);

    }
    public function addReceiving(Request $request)
    {
      // dd($request->all());
      // $purchase = Purchase::with('material.details')->where('strStatus', '=', 'Pending')
      // ->get();

      $purchase = Purchase::with('material.details')->where('strPStatus', '=', 'Pending')
      ->get();

      $id = str_random(10);
      ReceivePurchase::insert([
        'strReceivePurchaseID' => $id,
        'strPurchaseID' => $request->input('purchase_id'),
        'dtDeliveryReceived' => $request->input('date_delivered'),
        ]);


        if($request->input('mat_data') != ''){
          foreach($request->input('mat_data') as $material){
            ReceivePurchaseDetail::insert([
              'strReceivePurchaseID' => $id,
              'strMaterialID' => $material[0],
            ]);
          }

          $uomNme = $request->input('uom');
          $counter = 0;
          foreach ($request->input('mat_var') as $matVar) {
            $vari = DB::table('tblmaterialvariant')
              ->select('strMaterialVariantID')
              ->leftjoin('tbluom', 'tbluom.strUOMID', '=', 'tblmaterialvariant.strUOMID')
              ->where('tblmaterialvariant.intVariantQty', $matVar)
              ->where('tbluom.strUOMName', $uomNme[$counter])
              ->first()
              ->strMaterialVariantID;

            $arr[] = $vari;
            $counter = $counter + 1;
          }

        // $qty = $request->input('mat_qty');
        $qty = $request->input('mat_qty');
        $ctr = 0;

          foreach($request->input('mat_data') as $material){
            DB::table('tblreceivematvariantdetail')
              ->insert([
              'strMaterialID' => $material[0],
              'strMaterialVariantID' => $arr[$ctr],
              'intQtyReceived' => $qty[$ctr],
              // 'strUOMID' => $uomNme[$ctr],
            ]);
            $ctr = $ctr + 1;
          }

        }


    $receivepurchase = ReceivePurchase::with(['orders.details', 'orders.materialvariant'])->where('strReceivePurchaseID',$id)->first();
    return View('Transaction.receive-add')->with('receivepurchase', $receivepurchase)->with('purchase', $purchase);

    }

}
