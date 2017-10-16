<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustContact;
use App\Models\Quotation;
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

    public function viewQuote()
    {

      $quote =Quotation::with(['custpurchase', 'quoteprodvariant', 'customer.contact', 'termscondition', 'costing'])
        ->where('tblquotation.strQuoteStatus', '=', "For Approval")
        ->get();
      $quoteApproved =Quotation::with(['custpurchase', 'quoteprodvariant', 'customer', 'termscondition', 'costing'])
      ->where('tblquotation.strQuoteStatus', '=', "Approved")
      ->get();

     // $quote = DB::table('tblquotation')
     //        ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblquotation.strCustomerID')
     //        ->leftjoin('tblcustcontact', 'tblcustcontact.strCustomerID', 'tblcustomer.strCustomerID')
     //        ->where('tblquotation.strQuoteStatus', '=', "For Approval")
     //        ->get();

      // $quoteApproved = DB::table('tblquotation')
      //   ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblquotation.strCustomerID')
      //   ->leftjoin('tblcustcontact', 'tblcustcontact.strCustomerID', 'tblcustomer.strCustomerID')
      //   ->where('tblquotation.strQuoteStatus', '=', "Approved")
      //   ->get();

        // dd($quote);

      return view('Transaction.estimate')
      ->with('quoteApproved', $quoteApproved)
      ->with('quote', $quote);
    }

    public function updateApprove(Request $request)
    {
      DB::table('tblquotation')
          ->where('strQuoteID', $request->quote_id)
          ->update([
            'strQuoteStatus' => 'Approved'
          ]);
    }

    public function updateDisapprove(Request $request)
    {
      DB::table('tblquotation')
          ->where('strQuoteID', $request->quote_id)
          ->update([
            'strQuoteStatus' => 'Disapproved'
          ]);
    }

    public function addCart(Request $request)
    {
      $prodd = DB::table('tblproducttype')
        ->leftjoin('tblproduct', 'tblproduct.strProductTypeID', '=', 'tblproducttype.strProductTypeID')
        ->where('tblproduct.strProductName', $request->prodct_data)
        ->get();

        // dd($prodd);

			return Response::json($prodd);
    }

    public function termsView(Request $request)
    {
      $module = DB::table('tblmodule')
              ->where('strModuleName', $request->moduleName)
              ->first()
              ->strModuleID;
      // dd($module);
      $terms = DB::table('tbltermscondition')->where('strModuleID', $module)->get();

      return Response::json($terms);
    }

    public function varianceInfo(Request $request)
    {
      $prodVar = DB::table('tblmatspec')
        ->leftjoin('tblmatspecdetail', 'tblmatspecdetail.strMatSpecID', 'tblmatspec.strMatSpecID')
        ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblmatspec.strProductID')
        ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblmatspecdetail.strMaterialID')
        ->where('tblmatspec.strVarianceCode', $request->varianceCode)
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

//INSERT TO TBLQUOTEPRODUCTVARIANT
     $ctrr = 0;
     $qty = $request->input('qty');
     $rmrks = $request->input('remrks');
     $variance = $request->input('variance_code');
     $cost = $request->input('cost');
     foreach ($request->input('prod_id') as $prdctd) {
       QuoteProductVariant::insert([
         'strQuoteRequestID' => $id,
         'strProductID' => $prdctd[0],
         'strVarianceCode' => $variance[$ctrr],
         'dblRequestCost' => $cost[$ctrr],
         'intOrderQty' => $qty[$ctrr][0],
         'strRemarks' => $rmrks[$ctrr],
         'strQuoteStatus' => 'Pending'
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
      ->where('tblquoteproductvariant.strQuoteRequestID', $request->quote_id)
      ->get();

    return Response::json($readFinal);
  }

  public function modalInfo(Request $request)
  {
        $modalInfo = DB::table('tblquoterequest')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteRequestID', 'tblquoterequest.strQuoteRequestID')
          ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblquoteproductvariant.strProductID')
          ->where('tblquoterequest.strQuoteRequestID', '=',  $request->quote_id)
          ->get();

      return Response::json($modalInfo);
  }

  public function modalTableInfo(Request $request)
  {
    // dd($request->all());
    $modalTableInfo = DB::table('tblquoteproductvariant')
      ->leftjoin('tblquoterequest', 'tblquoteproductvariant.strQuoteRequestID', 'tblquoterequest.strQuoteRequestID')
      ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblquoteproductvariant.strProductID')
      ->where('tblquoteproductvariant.strQuoteRequestID', '=',  $request->quote_id)
      // ->where('tblquoteproductvariant.strStatus', '=', 'Pending')
      ->get();

  return Response::json($modalTableInfo);
  }

  public function varianceCode()
  {
    $varianceCode = Matspec::where('strStatus','Active')->get();

     // return Response::json($product);
    return Response::json($varianceCode);
  }

  public function getProduct(Request $request)
  {

    $product = DB::table('tblproduct')
      ->where('tblproduct.strStatus','Active')
      ->get();
    // dd($product);
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
  public function pdfEstimate(Request $request){
      // $po = QuoteRequest::with(['custpurchase.customer.contact', 'custpurchase.quotation.quoteprodvariant.details4'])
      //   ->where('tbljoborder.strJobOrdID', $request->input('id'))
      //   ->first();

      $po = DB::table('tblquotation')
            ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblquotation.strCustomerID')
            ->leftjoin('tblcustcontact', 'tblcustcontact.strCustomerID', 'tblcustomer.strCustomerID')
            ->leftjoin('tblcosting', 'tblcosting.strCostingID', 'tblquotation.strCostingID')
            ->leftjoin('tbltermscondition', 'tbltermscondition.strTermID', 'tblquotation.strTermID')
            ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
            ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblquoteproductvariant.strProductID')
            ->where('tblquotation.strQuoteID', '=', $request->input('id'))
            ->get();

      return $po;
    }
  // private function incID($id)
  // 	{
  //
  // 		$arrID = str_split($id);
  //
  // 		$new = "";
  // 		$somenew = "";
  // 		$arrNew = [];
  // 		$boolAdd = TRUE;
  //
  // 		for($ctr = count($arrID) - 1; $ctr >= 0; $ctr--)
  // 		{
  // 			$new = $arrID[$ctr];
  //
  // 			if($boolAdd)
  // 			{
  //
  // 				if(is_numeric($new) || $new == '0')
  // 				{
  // 					if($new == '9')
  // 					{
  // 						$new = '0';
  // 						$arrNew[$ctr] = $new;
  // 					}
  // 					else
  // 					{
  // 						$new = $new + 1;
  // 						$arrNew[$ctr] = $new;
  // 						$boolAdd = FALSE;
  // 					}//else
  // 				}//if(is_numeric($new))
  // 				else
  // 				{
  // 					$arrNew[$ctr] = $new;
  // 				}//else
  // 			}//if ($boolAdd)
  //
  // 			$arrNew[$ctr] = $new;
  // 		}//for
  //
  // 		for($ctr2 = 0; $ctr2 < count($arrID); $ctr2++)
  // 		{
  // 			$somenew = $somenew . $arrNew[$ctr2] ;
  // 		}
  // 		return $somenew;
  // 	}

}
