<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\QuoteProductVariant;
use DB;
use Response;

class PurchaseController extends Controller
{

  public function getCustPurchaseMax(){
    $id = DB::table('tblcustpurchase')
          ->select('strCustPurchaseID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strCustPurchaseID', 'desc')
          ->first();

    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strCustPurchaseID;

      $arrID = str_split($idd);



       for($ctr = count($arrID) - 1; $ctr >= 0; $ctr--)
       {
         $new = $arrID[$ctr];

         if($boolAdd)
         {

           if(is_numeric($new) || $new == '0')
           {
             if($new == '9')
             {
               $new = '0';
               $arrNew[$ctr] = $new;
             }
             else
             {
               $new = $new + 1;
               $arrNew[$ctr] = $new;
               $boolAdd = FALSE;
             }//else
           }//if(is_numeric($new))
           else
           {
             $arrNew[$ctr] = $new;
           }//else
         }//if ($boolAdd)

         $arrNew[$ctr] = $new;
       }//for

       for($ctr2 = 0; $ctr2 < count($arrID); $ctr2++)
       {
         $somenew = $somenew . $arrNew[$ctr2] ;
      }
     }
     else{
      $somenew = 'SO-00001';
     }
    return response()->json($somenew);
  }

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

  public function viewCustomerPurchases()
  {
    return view('Transaction.customerPurchases');
  }

  public function customerPurchases()
  {
    $prchs = DB::table('tblcustpurchase')
      ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblcustpurchase.strCustomerID')
      ->get();

    return Response::json($prchs);
  }

  public function getProducts()
  {
    $prods = DB::table('tblproduct')->where('strStatus', 'Active')->get();

    return Response::json($prods);
  }

  public function getQuote()
  {
    $quotes = DB::table('tblquotation')->get();

    return Response::json($quotes);
  }

   public function selectedQuote(Request $request)
  {
    $quotes = DB::table('tblquotation')
              ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblquotation.strCustomerID')
              ->leftjoin('tblcosting', 'tblcosting.strCustomerID', 'tblcustomer.strCustomerID')
              ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblcosting.strProductID')
              ->where('tblquotation.strQuoteID',  $request->quote_id)
              ->get();

    return Response::json($quotes);
  }

  public function addProducts(Request $request)
  {
    $prd = DB::table('tblproduct')
      ->leftjoin('tblproducttype', 'tblproducttype.strProductTypeID', 'tblproduct.strProductTypeID')
      ->leftjoin('tblcosting', 'tblcosting.strProductID', 'tblproduct.strProductID')
      ->leftjoin('tblcostingmaterial', 'tblcostingmaterial.strCostingID', 'tblcosting.strCostingID')
      ->leftjoin('tblquotation', 'tblquotation.strCostingID', 'tblcosting.strCostingID')
      ->leftjoin('tblmatspec', 'tblmatspec.strMatSpecID', 'tblcosting.strMatSpecID')
      ->where('tblproduct.strProductID', $request->prod_name)
      ->where('tblquotation.strQuoteID', $request->quote_id)
      ->first();
      // ->sum('tblcostingmaterial.dblFinalCost');
    // dd($prd);
    return Response::json($prd);
  }

  public function customerName(Request $request)
  {
    $cust = DB::table('tblquotation')
      ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblquotation.strCustomerID')
      ->where('tblquotation.strQuoteID', $request->quote_id)
      ->first();

    return Response::json($cust);
  }

  public function addPurchase(Request $request)
  {
    // dd($request->all());
    DB::table('tblcustpurchase')
      ->insert([
        'strCustPurchaseID' => $request->input('id'),
        'strPOID' => $request->input('po_id'),
        'dtOrderDate' => $request->input('orderDate'),
        'dtDeliveryDate' => $request->input('targetDate'),
        'strCustomerID' => $request->input('customer_id'),
        'strQuoteID' => $request->input('quote_ref'),
        'created_at' => $request->input('created_at'),
    ]);

    $ctrr = 0;
    $variance = $request->input('variance_code');
    $cost = $request->input('cost');
    $qty = $request->input('qty');
    $rmrks = $request->input('rmrks');
    foreach ($request->input('product_id') as $prdctd) {
      DB::table('tblquoteproductvariant')
      ->insert([
        'strQuoteID' => $request->input('quote_ref'),
        'strProductID' => $prdctd,
        'strVarianceCode' => $variance[$ctrr],
        'dblRequestCost' => $cost[$ctrr],
        'intOrderQty' => $qty[$ctrr][0],
        'strRemarks' => $rmrks[$ctrr],
        'strQuoteStatus' => 'Pending'
      ]);
      $ctrr = $ctrr + 1;
    }
  }

}
