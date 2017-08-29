<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use App\Models\MatSpec;
use App\Models\QuoteProductVariant;
use App\Models\Product;
use App\Models\Unit;
use App\Models\ProductVariant;
use DB;
use Response;
use Session;
use PDF;

class EstimateController extends Controller
{
    public function viewEstimate()
    {
    $estimate = DB::table('tblquoterequest')
      ->get();

      return Response::json($estimate);
      // return view('Transaction.estimate')
      // ->with('estimate',$estimate);
    }

    public function editQuote(Request $request)
    {
      $editQuote = DB::table('tblquoterequest')
        ->where('tblquoterequest.strQuoteRequestID', $request->input('quote_id'))
        ->first();

      $editQuoteProduct = DB::table('tblquoteproductvariant')
        ->where('tblquoteproductvariant.strQuoteRequestID', $request->input('quote_id'))
        ->get();

        $editProductData = $editQuoteProduct->toArray();

        Session::put('strQuoteRequestID',$editQuote->strQuoteRequestID);
        Session::put('strCompanyName',$editQuote->strCompanyName);
        Session::put('strCustStreet',$editQuote->strCustStreet);
        Session::put('strCustBrgy',$editQuote->strCustBrgy);
        Session::put('strCustCity',$editQuote->strCustCity);
        Session::put('strCustContactPerson',$editQuote->strCustContactPerson);
        Session::put('strCustEmail',$editQuote->strCustEmail);
        Session::put('strCustContactNo',$editQuote->strCustContactNo);

        // $i = 0;
        foreach ($editProductData as $sessionData) {
          Session::push('strProductID', $sessionData->strProductID);
          Session::push('strProductVariantID', $sessionData->strProductVariantID);
          Session::push('intOrderQty', $sessionData->intOrderQty);
          Session::push('strRemarks', $sessionData->strRemarks);
          // $i = $i + 1;
        }
    }

    public function updateQuote(Request $request)
    {

    }

    public function viewAddEstimate()
    {
     $estimate = QuoteRequest::with('product.details4')->where('strStatus','Approved')->get();
     $product = Product::where('strStatus', 'Active')->get();

     Session::forget('strQuoteRequestID');
     Session::forget('strCompanyName');
     Session::forget('strCustStreet');
     Session::forget('strCustBrgy');
     Session::forget('strCustCity');
     Session::forget('strCustContactPerson');
     Session::forget('strCustEmail');
     Session::forget('strCustContactNo');


      // return Response::json($product);
     return view('Transaction.estimate-add');
    //  ->with('estimate',$estimate)
    //  ->with('prodd', $product);
    }

    public function addCart(Request $request)
    {
      $prodd = DB::table('tblproducttype')
        ->leftjoin('tblproduct', 'tblproduct.strProductTypeID', '=', 'tblproducttype.strProductTypeID')
        ->where('tblproduct.strProductName', $request->prodct_data)
        ->get();

			return Response::json($prodd);
    }

    public function submitOrder(Request $request)
    {
      $prodVar = DB::table('tblproductvariant')
        ->leftjoin('tblproductdetail', 'tblproductdetail.strProductVariantID', '=', 'tblproductvariant.strProductVariantID')
        ->leftjoin('tblproduct', 'tblproduct.strProductID', '=', 'tblproductdetail.strProductID')
        ->leftjoin('tbluom', 'tbluom.strUOMID', '=', 'tblproductvariant.strUOMID')
        ->where('tblproduct.strProductName', $request->prodName)
        // ->where('tblproduct.strProductName', $request->prodName)
        ->get();

			return Response::json($prodVar);
    }


  public function tofinal(Request $request)
  {
    // dd($request->all());
      $id = str_random(10);

//INSERT TO TBLQUOTEREQUEST
      QuoteRequest::insert([
        'strQuoteRequestID' => $id,
        'strCompanyName' => $request->input('company_name'),
        'strCustStreet' => $request->input('street'),
        'strCustBrgy' => $request->input('brgy'),
        'strCustCity' => $request->input('city'),
        'strCustContactPerson' => $request->input('contact_person'),
        'strCustEmail' => $request->input('email'),
        'strCustContactNo' => $request->input('contact_no'),
        'strStatus' => 'Pending'
     		]);

// GET VARIANT ID
     $uomNme = $request->input('uom_name');
     $counter = 0;
     foreach ($request->input('var_qty') as $intVarQty) {
       $vari = DB::table('tblproductvariant')
         ->select('strProductVariantID')
         ->leftjoin('tbluom', 'tbluom.strUOMID', '=', 'tblproductvariant.strUOMID')
         ->where('tblproductvariant.intVariantQty', $intVarQty)
         ->where('tbluom.strUOMName', $uomNme[$counter])
         ->first()
         ->strProductVariantID;

       $arr[] = $vari;
       $counter = $counter + 1;
     }


//INSERT TO TBLQUOTEPRODUCTVARIANT
     $ctrr = 0;
     $qty = $request->input('qty');
     $rmrks = $request->input('remrks');
     foreach ($request->input('prod_id') as $prdctd) {
       QuoteProductVariant::insert([
         'strQuoteRequestID' => $id,
         'strProductID' => $prdctd[0],
         'strProductVariantID' => $arr[$ctrr],
         'intOrderQty' => $qty[$ctrr][0],
         'strRemarks' => $rmrks[$ctrr],
         'strStatus' => 'Pending'
       ]);
       $ctrr = $ctrr + 1;
     }

     //PUT DATA TO SESSION FOR ESTIMATE-FINAL
           Session::put('compname',$request->input('company_name'));
           Session::put('street',$request->input('street'));
           Session::put('brgy',$request->input('brgy'));
           Session::put('city',$request->input('city'));
           Session::put('contactperson',$request->input('contact_person'));
           Session::put('email',$request->input('email'));
           Session::put('contactnum',$request->input('contact_no'));
           Session::put('quotenum',$id);

  }

  public function finalRead(Request $request)
  {

    $readFinal = DB::table('tblquoteproductvariant')
      ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblquoteproductvariant.strProductID')
      ->leftjoin('tblproductvariant', 'tblproductvariant.strProductVariantID', 'tblquoteproductvariant.strProductVariantID')
      ->leftjoin('tbluom', 'tbluom.strUOMID', 'tblproductvariant.strUOMID')
      ->where('tblquoteproductvariant.strQuoteRequestID', $request->quote_id)
      ->get();

    return Response::json($readFinal);
  }

  public function modalInfo(Request $request)
  {
        $modalInfo = DB::table('tblquoterequest')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteRequestID', 'tblquoterequest.strQuoteRequestID')
          ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblquoteproductvariant.strProductID')
          ->leftjoin('tblproductvariant', 'tblproductvariant.strProductVariantID', 'tblquoteproductvariant.strProductVariantID')
          ->leftjoin('tbluom', 'tbluom.strUOMID', 'tblproductvariant.strUOMID')
          ->where('tblquoterequest.strQuoteRequestID', '=',  $request->quote_id)
          ->get();

      return Response::json($modalInfo);
  }

  public function modalTableInfo(Request $request)
  {
    // dd($request->all());
    $modalTableInfo = DB::table('tblquoterequest')
      ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteRequestID', 'tblquoterequest.strQuoteRequestID')
      ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblquoteproductvariant.strProductID')
      ->leftjoin('tblproductvariant', 'tblproductvariant.strProductVariantID', 'tblquoteproductvariant.strProductVariantID')
      ->leftjoin('tbluom', 'tbluom.strUOMID', 'tblproductvariant.strUOMID')
      ->where('tblquoterequest.strQuoteRequestID', '=',  $request->quote_id)
      ->where('tblquoteproductvariant.strStatus', '=', 'Pending')
      ->get();

  return Response::json($modalTableInfo);
  }

  public function varianceCode()
  {
    $varianceCode = Matspec::where('strStatus','Active')->get();

     // return Response::json($product);
    return Response::json($varianceCode);
  }

  public function getProduct()
  {
    $product = Product::where('strStatus','Active')->get();
    dd($product);
    return Response::json($product);
  }

  public function htmltopdfview(Request $request)
    {
        $products = QuoteRequest::with('product.details4');
        // view()->share('estimate',$estimate);
        if($request->has('download')){
            $pdf = PDF::loadView('quotation');
            return $pdf->download('Quotation.pdf');
        }

        return view('quotation');
    }
   public function getEstimate(Request $request)
  {

    $estimate = QuoteRequest::with('product.details4')->where('strQuoteRequestID', $request->estimate_id)->first();
    return $estimate;
  }
  public function approveEstimate(Request $request)
  {

   foreach ($request->input('estimate_id') as $estimateID) {
      QuoteRequest::where('tblquoterequest.strQuoteRequestID', $estimateID)
                ->update([
                  'strStatus' => 'Approved',
                ]);
    }
  }


}
