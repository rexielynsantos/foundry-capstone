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

    
   
      // return Response::json($products);
      return view('Dashboard.dashboard')
      ->with('products',$products)
      ->with('orders',$orders)
      ->with('customer',$customer)
      ->with('supplier',$supplier);
  }
}
