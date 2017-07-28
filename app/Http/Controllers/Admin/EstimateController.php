<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use App\Models\QuoteProduct;
use App\Models\Product;
use DB;
use Response;

class EstimateController extends Controller
{
    public function viewEstimate()
    {
    $estimate = QuoteRequest::with('product.details4')->where('strStatus','Approved')->get();

      // return Response::json($product);
      return view('Transaction.estimate')
      ->with('estimate',$estimate);
    }
    public function viewAddEstimate()
    {
     $estimate = QuoteRequest::with('product.details4')->where('strStatus','Approved')->get();
     $product = Product::where('strStatus', 'Active')->get();
      // return Response::json($product);
     return view('Transaction.estimate-add')
     ->with('estimate',$estimate)
     ->with('prodd', $product);
    }

    public function addCart(Request $request)
    {
      $prodd = DB::table('tblproducttype')
        ->leftjoin('tblproduct', 'tblproduct.strProductTypeID', '=', 'tblproducttype.strProductTypeID')
        ->where('tblproduct.strProductName', $request->prodct_data)
        ->get();

			return Response::json($prodd);
    }

  	public function addEstimate(Request $request)
  	{
    $id = str_random(10);
    QuoteRequest::insert([
      'strQuoteRequestID' => $id,
      'strCompanyName' => $request->input('company_name'),
      'strStreet' => $request->input('street'),
      'strBrgy' => $request->input('brgy'),
      'strCity' => $request->input('city'),
      'strContactPerson' => $request->input('contact_person'),
      'strContactNo' => $request->input('contact_no'),
      'strStatus' => 'Approved'
   		]);

    if($request->input('product_data') != ''){
      foreach($request->input('product_data') as $product){
        QuoteProduct::insert([
          'strQuoteRequestID' => $id,
          'strProductID' => $product,
          'strRemarks' => $request_input('remarks')
        ]);
        // if($request->input('product_data') != ''){
          foreach($request->input('product_data') as $product){
            QuoteProduct::insert([
              'strQuoteRequestID' => $id,
              'strProductID' =>$product
              ]);
          }
        // }

      }
    }

    $estimate = QuoteRequest::with('product.details4')->where('strQuoteRequestID', $id)->first();

    return $estimate;
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
