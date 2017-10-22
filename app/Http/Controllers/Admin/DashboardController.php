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

    $costingAll= DB::table('tblcosting')
                ->count();
    $costingPer = DB::table('tblcosting')
                ->where('strCostingStatus', 'Approved')->count()/$costingAll*100;

    $costing = DB::table('tblcosting')
                ->where('strCostingStatus', 'Approved')->count();

     $quoteAll= DB::table('tblquotation')
                ->count();
    $quotePer = DB::table('tblquotation')
                ->where('strQuoteStatus', 'Approved')->count()/$quoteAll*100;

    $quote = DB::table('tblquotation')
                ->where('strQuoteStatus', 'Approved')->count();

    $jobAll= DB::table('tbljoborder')
                ->count();
    $jobPer = DB::table('tbljoborder')
                ->where('strJobOrdStatus', 'On-Process')->count()/$jobAll*100;

    $job = DB::table('tbljoborder')
                ->where('strJobOrdStatus', 'On-Process')->count();

    $salesAll= DB::table('tblcustpurchase')
                ->count();
    $salesPer = DB::table('tblcustpurchase')
                ->where('strSOStatus', 'On-Process')->count()/$salesAll*100;

    $sales = DB::table('tblcustpurchase')
                ->where('strSOStatus', 'On-Process')->count();


      // return Response::json($products);
      return view('Dashboard.dashboard')
      ->with('products',$products)
      ->with('orders',$orders)
      ->with('customer',$customer)
      ->with('purch', $purch)
      ->with('supplier',$supplier)
      ->with('joborders', $joborder)
      ->with('costing', $costing)
      ->with('costingPer', $costingPer)
      ->with('costingAll', $costingAll)
      ->with('quote', $quote)
      ->with('quotePer', $quotePer)
      ->with('quoteAll', $quoteAll)
      ->with('job', $job)
      ->with('jobPer', $jobPer)
      ->with('jobAll', $jobAll)
      ->with('sales', $sales)
      ->with('salesPer', $salesPer)
      ->with('salesAll', $salesAll);
  }
}
