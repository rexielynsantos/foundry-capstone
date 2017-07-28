<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use DB;
use Response;
class CustomerController extends Controller
{
    public function viewCustomer()
  {
    $product = DB::table('tblcustomer')
                ->where('tblcustomer.strStatus', '=' , 'Pending')
                ->get();
      // return Response::json($product);
      return view('Transaction.customer')
      ->with('customer',$product);
  }
  public function addCustomer(Request $request)
  {
    try {
      DB::beginTransaction();
      $id = str_random(10);
      Customer::create([
        'strCustomerID' => $id,
        'strCustomerName' => $request->input('cust_name'),
        'strContactPerson' => $request->input('cust_contperson'),
        'strCustomerStreet' => $request->input('cust_street'),
        'strCustomerBrgy' => $request->input('cust_brgy'),
        'strCustomerCity' => $request->input('cust_city'),
        'strCustomerContact' => $request->input('cust_contact'),
        'strCustomerEmail' => $request->input('cust_email'),
        'strStatus' => 'Pending',
      ]);
    DB::commit();
    $product = DB::table('tblcustomer')
                  ->where('tblcustomer.strStatus', '=' , 'Active')
                  ->get();
    return Response::json($product);
    } catch (\Illuminate\Database\QueryException $e) {
      DB::rollback();
      return 'error';
    }
    
  }
  public function editCustomer(Request $request)
  {
    $product = DB::table('tblcustomer')       
                ->where('tblcustomer.strCustomerID', '=' , $request->input('cust_id'))
                ->get();
    return Response::json($product);
  }

  

}
