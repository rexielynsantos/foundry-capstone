<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;

class DashboardController extends Controller
{
    public function viewDashboard()
  {
    $products = DB::table('tblproduct')
                ->count();
    $orders = DB::table('tblcustpurchase')
                ->count();
    $customer = DB::table('tblcustomer')
                ->count();
    $supplier = DB::table('tblsupplier')
                ->count();
    $purch = DB::table('tblcustpurchase')
              ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblcustpurchase.strCustomerID')
               ->select('tblcustpurchase.*','tblcustomer.strCompanyName')
              ->get(); 
    $joborder = DB::table('tbljoborder')
                ->count();

    
   
      // return Response::json($products);
      return view('Dashboard.dashboard')
      ->with('products',$products)
      ->with('orders',$orders)
      ->with('customer',$customer)
      ->with('purch', $purch)
      ->with('supplier',$supplier)
      ->with('joborders', $joborder);
  }
}
