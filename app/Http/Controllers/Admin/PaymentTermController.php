<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentTermRequest;
use App\Http\Controllers\Controller;
use DB;
use Response;
class PaymentTermController extends Controller
{
  public function viewPaymentTerms()
  {
    $product = DB::table('tblpaymentterm')
                ->where('tblpaymentterm.strStatus', '=' , 'Active')
                ->get();
      // return Response::json($product);
      return view('Utilities.paymentTerms')
      ->with('paymentTerms',$product);
  }
  public function addPaymentTerms(PaymentTermRequest $request)
  {
    $id = str_random(10);
    DB::table('tblpaymentterm')->insert([
      'strPaymentTermID' => $id,
      'strPaymentTermName' => $request->input('pterm_name'),
      'strPaymentTermDesc' => $request->input('pterm_desc'),
      'strStatus' => 'Active',
    ]);

    $product = DB::table('tblpaymentterm')
                ->where('tblpaymentterm.strPaymentTermID', '=' , $id)
                ->get();
    return Response::json($product);
  }
  public function editPaymentTerms(Request $request)
  {
    $product = DB::table('tblpaymentterm')
                ->where('tblpaymentterm.strPaymentTermID', '=' , $request->input('pterm_id'))
                ->get();
    return Response::json($product);
  }
  public function updatePaymentTerms(PaymentTermRequest $request)
  {
    DB::table('tblpaymentterm')
    ->where('tblpaymentterm.strPaymentTermID', '=', $request->input('pterm_id'))
    ->update([
      'strPaymentTermName' => $request->input('pterm_name'),
      'strPaymentTermDesc' => $request->input('pterm_desc'),
    ]);

    $paymentTerm = DB::table('tblpaymentterm')
                ->where('tblpaymentterm.strPaymentTermID', '=' , $request->input('pterm_id'))
                ->get();
    return Response::json($paymentTerm);
  }
  public function deletePaymentTerms(Request $request)
  {
    foreach ($request->input('pterm_id') as $paymentTermID) {
      DB::table('tblpaymentterm')
      ->where('tblpaymentterm.strPaymentTermID', '=', $paymentTermID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }
  public function reactivatePaymentTerms()
  {
    $product = DB::table('tblpaymentterm')
                ->where('tblpaymentterm.strStatus', '=' , 'Inactive')
                ->get();
      // return Response::json($product);
      return view('Reactivation.paymentTermReactivation')
      ->with('paymentTerms',$product);
  }
  public function activatePaymentTerms(Request $request)
  {
    foreach ($request->input('pterm_id') as $paymentTermID) {
      DB::table('tblpaymentterm')
      ->where('tblpaymentterm.strPaymentTermID', '=', $paymentTermID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }
}
