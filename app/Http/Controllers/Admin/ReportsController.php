<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;


class ReportsController extends Controller
{
    public function viewReport()
  	{

      $count = DB::table('tblcustpurchase')
              ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblcustpurchase.strCustomerID')
              // ->select('tblcustpurchase.strCustomerID')
              ->count();
      // return Response::json($product);
      return view('Reports.reports');
  	}

    public function viewTable1Info()
    {
      $customerID =  DB::table('tblcustomer')
              ->select('strCustomerID')
              ->groupBy('strCustomerID')
              ->orderByRaw('COUNT(*) ASC')
              ->pluck('strCustomerID')
              ->toArray();

      $arrCustName = [];
      $arrCounter = [];
      foreach ($customerID as $custID) {
        $getCustName = DB::table('tblcustomer')
                  ->select('strCompanyName')
                  ->where('strCustomerID', $custID)
                  ->pluck('strCompanyName')
                  ->toArray();

        array_push($arrCustName,$getCustName);

        $counter = DB::table('tblcustpurchase')->where('strCustomerID', $custID)->count();

        array_push($arrCounter,$counter);
        // dd($customerID);
      }
      return Response::json(array('customer'=>$arrCustName, 'count'=>$arrCounter));
    }
}
