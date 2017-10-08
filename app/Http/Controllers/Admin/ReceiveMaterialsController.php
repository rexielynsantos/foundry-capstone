<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
use App\Models\ReceivePurchase;
use App\Models\ReceivePurchaseDetail;
use App\Models\ReceivepurchaseOrder;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\PurchaseDetail;
use App\Models\Material;

class ReceiveMaterialsController extends Controller
{
    public function viewReceivePurchase()
    {

     $rp =    $receivepurchase = ReceivePurchase::with(['order.details'])
     ->get();
     return view('Transaction.receivePurchase')
     ->with('rp', $rp);
    }
    public function viewReceiveAddPurchase()
    {

  	 $supp = Supplier::where('strStatus', 'Active')
  	 	->get();


     return view('Transaction.receive-add')
     ->with('supp', $supp);

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
    public function getPOInfo(Request $request)
    {
      $material = DB::table('tblpurchase')
                // ->leftjoin('tblpurchasedetail', 'tblpurchasedetail.strPurchaseID', '=', 'tblpurchase.strPurchaseID')
                ->leftjoin('tblpurchmatvariantdetail', 'tblpurchmatvariantdetail.strPurchaseID', '=', 'tblpurchase.strPurchaseID')
                ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', '=', 'tblpurchmatvariantdetail.strMaterialID')
                ->where('tblpurchase.strPurchaseID',  $request->po_id)
                ->get();

      return Response::json($material);
    }

    public function getPO(Request $request)
    {
      $referencePO = DB::table('tblpurchase')
              ->where('strSupplierID', $request->supplier_id)
              ->get();

      return Response::json($referencePO);
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

      $id = str_random(10);
      ReceivePurchase::insert([
        'strReceivePurchaseID' => $id,
        'strPurchaseID' => $request->input('purchase_id'),
        'dtDeliveryReceived' => $request->input('date_delivered'),
        'created_at'=> $request->input('created_at'),
        'isActive' => 1,
        ]);


        if($request->input('mat_data') != ''){
          $ct = 0;
          $qty = $request->input('mat_qty');
          foreach($request->input('mat_data') as $material){
            ReceivePurchaseDetail::insert([
              'strReceivePurchaseID' => $id,
              'strMaterialID' => $material,
              'quantityReceived' => $qty[$ct],
              'qtyReturned' => 0,
              'isActive' => 1,
              'created_at'=> $request->input('created_at')
            ]);

            ReceivepurchaseOrder::insert([
              'strReceivePurchaseID' => $id,
              'strPurchaseID' => $request->input('purchase_id')
            ]);

            $ct = $ct + 1;
          }
        }

        $supp = Supplier::where('strStatus', 'Active')
      ->get();


    $receivepurchase = ReceivePurchase::with(['order.details', 'purchase', 'purchase.supplier'])->where('strReceivePurchaseID',$id)->first();
    return View('Transaction.receive-add')->with('receivepurchase', $receivepurchase)->with('supp', $supp);

    }

}
