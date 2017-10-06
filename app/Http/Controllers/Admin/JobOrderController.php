<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuoteJobOrder;
use DB;
use Response;
use Session;

class JobOrderController extends Controller
{
    public function viewJobOrder()
    {
    $joborder = DB::table('tblquotejoborder')
      ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strProductID', 'tblquotejoborder.strProductID')
      ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblquoteproductvariant.strProductID')
      ->leftjoin('tblproductvariant', 'tblproductvariant.strProductVariantID', 'tblquoteproductvariant.strProductVariantID')
      ->leftjoin('tbluom', 'tbluom.strUOMID', 'tblproductvariant.strUOMID')
      ->where('tblquoteproductvariant.strQuoteStatus', 'Generated')
      ->get();

      // dd($joborder);
      return Response::json($joborder);
      // return view('Transaction.joborders')
      // ->with('joborder',$joborder);
    }
    public function addJobOrder(Request $request)
    {
      // dd($request->all());
      $id = str_random(10);
      DB::table('tblquoteproductvariant')
    ->where('tblquoteproductvariant.strQuoteRequestID', '=', $request->input('quote_id'))
    ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
    ->update([
      'strQuoteStatus' => 'Generated'
    ]);

      QuoteJobOrder::insert([
        'strJobOrderID' => $id,
        'strQuoteRequestID' => $request->quote_id,
        'strProductID' => $request->prod_id
      ]);

      $generated = QuoteJobOrder::with(['quotedetails', 'product', 'matspec'])->where('strQuoteRequestID', $request->input('quoteID'))->first();
      return $generated;
    }

    public function joborderMaterial(Request $request)
    {
      Session::put('jobOrderID',$request->input('job_id'));
    }

    public function approveJob(Request $request)
    {
      DB::table('tblquoterequest')
        ->where('tblquoterequest.strQuoteRequestID', $request->input('quote_id'))
        ->update([
        'strStatus' => 'Approved'
      ]);
    }
}
