<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Stock;
use App\Models\Unit;
use App\Models\Material;

use App\Models\MaterialDetail;
use App\Models\MaterialVariant;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\ReceivePurchase;
use App\Models\ReceivePurchaseDetail;

use Response;

class StocksController extends Controller
{
    public function viewStocks()
  	{

    $stocks = Stock::get();
    $material =Material::with(['materialsupplier.supplier','variant', 'unit'])->get();

      // return Response::json($stocks);
      return view('Transaction.stockcard')
      ->with('stocks',$stocks)
      ->with('material', $material);
  	}

  	public function getStockDetails(Request $request)

    {
      // $mat = DB::table('tblmaterial')
      $mat = Material::with(['materialsupplier.supplier','variant', 'unit'])
      ->where('strMaterialID', $request->material_id)
      ->get();


    return Response::json($mat);


    }
    public function getReceivingRecords(Request $request)
    {
      // dd($request->input('material_id'));
      $delivery = DB::table('tblreceivepurchase')
      ->leftjoin('tblpurchase', 'tblpurchase.strPurchaseID', 'tblreceivepurchase.strPurchaseID')
      ->leftjoin('tblreceivepurchasedetail', 'tblreceivepurchasedetail.strReceivePurchaseID', 'tblreceivepurchase.strReceivePurchaseID')
      ->leftjoin('tblreceivematvariantdetail', 'tblreceivematvariantdetail.strMaterialID', 'tblreceivepurchasedetail.strMaterialID')
      ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblreceivepurchasedetail.strMaterialID')

      ->where('tblreceivepurchasedetail.strMaterialID',  $request->input('material_id'))
      ->get();
      // $delivery = ReceivePurchase::with('orders.details','orders.materialvariant')
      // ->where('tblreceivepurchasedetail.strMaterialID', $request->material_id)->get();

    return Response::json($delivery);
    }
    public function getRequisitionRecords(Request $request)
    {
      // dd($request->input('material_id'));
      $delivery = DB::table('tblmaterialrequisition')
      ->leftjoin('tbljoborder', 'tblpurchase.strPurchaseID', 'tblreceivepurchase.strPurchaseID')
      ->leftjoin('tblreceivepurchasedetail', 'tblreceivepurchasedetail.strReceivePurchaseID', 'tblreceivepurchase.strReceivePurchaseID')
      ->leftjoin('tblreceivematvariantdetail', 'tblreceivematvariantdetail.strMaterialID', 'tblreceivepurchasedetail.strMaterialID')
      ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblreceivepurchasedetail.strMaterialID')

      ->where('tblreceivepurchasedetail.strMaterialID',  $request->input('material_id'))
      ->get();
      // $delivery = ReceivePurchase::with('orders.details','orders.materialvariant')
      // ->where('tblreceivepurchasedetail.strMaterialID', $request->material_id)->get();

    return Response::json($delivery);
    }
    // public function getRequisitionRecords(Request $request)
    // {
    //   $requisition = ReceivePurchase::with('orders.details')
    //   ->where('tblreceivepurchasedetail.strMaterialID', $request->material_id)->get();

    // return Response::json($requisition);
    // }



}
