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

    public function viewTable1InfoDate(Request $request)
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

        $counter = DB::table('tblcustpurchase')->where('strCustomerID', $custID)->whereBetween('dtOrderDate', array($request->from, $request->to))->count();

        array_push($arrCounter,$counter);
        // dd($customerID);
      }
      return Response::json(array('customer'=>$arrCustName, 'count'=>$arrCounter));
    }

    public function viewTable2Info()
    {
      $MatID =  DB::table('tblreceivepurchasedetail')
              ->select('strMaterialID')
              ->groupBy('strMaterialID')
              ->orderByRaw('COUNT(*) ASC')
              ->pluck('strMaterialID')
              ->toArray();

      $arrMatName = [];
      $arrTotQty = [];
      $arrReorder = [];
      $arrdelivered = [];
      $arrreceived = [];
      foreach ($MatID as $mtID) {
        $getMatName = DB::table('tblmaterial')
                  ->select('strMaterialName')
                  ->where('strMaterialID', $mtID)
                  ->pluck('strMaterialName')
                  ->toArray();

        array_push($arrMatName,$getMatName);

        $getTotQty = DB::table('tblmaterial')
                  ->select('intQtyOnHand')
                  ->where('strMaterialID', $mtID)
                  ->pluck('intQtyOnHand')
                  ->toArray();

        array_push($arrTotQty,$getTotQty);

        $getReorder = DB::table('tblmaterial')
                  ->select('intReorderLevel')
                  ->where('strMaterialID', $mtID)
                  ->pluck('intReorderLevel')
                  ->toArray();

        array_push($arrReorder,$getReorder);

        $delivered = DB::table('tblreceivepurchasedetail')->where('strMaterialID', $mtID)->sum('quantityReceived');
        $received = DB::table('tblreturndetail')->where('strMaterialID', $mtID)->sum('quantityReturned');

        array_push($arrdelivered,$delivered);
        array_push($arrreceived,$received);
        // dd($customerID);
      }
      return Response::json(array('material'=>$arrMatName, 'totqty'=>$arrTotQty, 'reorder'=>$arrReorder, 'delivered'=>$arrdelivered, 'returned'=>$arrreceived));
    }

    public function viewTable2InfoDate(Request $request)
    {
      $MatID =  DB::table('tblreceivepurchasedetail')
              ->select('strMaterialID')
              ->groupBy('strMaterialID')
              ->orderByRaw('COUNT(*) ASC')
              ->pluck('strMaterialID')
              ->toArray();

      $arrMatName = [];
      $arrTotQty = [];
      $arrReorder = [];
      $arrdelivered = [];
      $arrreceived = [];
      foreach ($MatID as $mtID) {
        $getMatName = DB::table('tblmaterial')
                  ->select('strMaterialName')
                  ->where('strMaterialID', $mtID)
                  ->pluck('strMaterialName')
                  ->toArray();

        array_push($arrMatName,$getMatName);

        $getTotQty = DB::table('tblmaterial')
                  ->select('intQtyOnHand')
                  ->where('strMaterialID', $mtID)
                  ->pluck('intQtyOnHand')
                  ->toArray();

        array_push($arrTotQty,$getTotQty);

        $getReorder = DB::table('tblmaterial')
                  ->select('intReorderLevel')
                  ->where('strMaterialID', $mtID)
                  ->pluck('intReorderLevel')
                  ->toArray();

        array_push($arrReorder,$getReorder);

        $delivered = DB::table('tblreceivepurchasedetail')
                  ->leftjoin('tblreceivepurchase', 'tblreceivepurchase.strReceivePurchaseID', 'tblreceivepurchasedetail.strReceivePurchaseID')
                  ->where('strMaterialID', $mtID)
                  ->whereBetween('tblreceivepurchase.dtDeliveryReceived', array($request->from, $request->to))
                  ->sum('tblreceivepurchasedetail.quantityReceived');

        $received = DB::table('tblreturndetail')
                ->leftjoin('tblreturnheader', 'tblreturnheader.strReturnID', 'tblreturndetail.strReturnID')
                ->where('strMaterialID', $mtID)
                ->whereBetween('dateReturned', array($request->from, $request->to))
                ->sum('quantityReturned');

        array_push($arrdelivered,$delivered);
        array_push($arrreceived,$received);
        // dd($customerID);
      }
      return Response::json(array('material'=>$arrMatName, 'totqty'=>$arrTotQty, 'reorder'=>$arrReorder, 'deliveredDate'=>$arrdelivered, 'returnedDate'=>$arrreceived));
    }
}
