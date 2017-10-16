<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;

class QueryController extends Controller
{

    public function viewTable1Info()
    {
      $mostProducts = DB::table('tblcosting')
              ->select('strProductID')
              ->groupBy('strProductID')
              ->orderByRaw('COUNT(*) DESC')
              ->pluck('strProductID')
              ->toArray();

      $arrProdName = [];
      $arrProdDesc = [];
      $arrCounter = [];
      $ct = 0;
      foreach ($mostProducts as $prodID) {
        $getProdName = DB::table('tblproduct')
                  ->select('strProductName')
                  ->where('strProductID', $prodID)
                  ->pluck('strProductName')
                  ->toArray();

        $getProdDesc = DB::table('tblproduct')
                  ->select('strProductDesc')
                  ->where('strProductID', $prodID)
                  ->pluck('strProductDesc')
                  ->toArray();
        array_push($arrProdName,$getProdName);
        array_push($arrProdDesc,$getProdDesc);
        $counter = DB::table('tblcosting')->where('strProductID', $prodID)->count();

        $arrCounter[$ct] = $counter;
        $ct = $ct + 1;
      }
      // dd($arrProdName);

      return Response::json(array('product'=>$arrProdName, 'productDesc'=>$arrProdDesc, 'count'=>$arrCounter));
    }

    public function viewTable2Info()
    {
      $mostMaterial = DB::table('tblpurchasedetail')
              ->select('strMaterialID')
              ->groupBy('strMaterialID')
              ->orderByRaw('COUNT(*) DESC')
              ->pluck('strMaterialID')
              ->toArray();

      $arrMatName = [];
      $arrMatDesc = [];
      $arrCounter = [];
      $ct = 0;
      foreach ($mostMaterial as $materialID) {
        $getMatName = DB::table('tblmaterial')
                  ->select('strMaterialName')
                  ->where('strMaterialID', $materialID)
                  ->pluck('strMaterialName')
                  ->toArray();

        $getMatDesc = DB::table('tblmaterial')
                  ->select('strMaterialDesc')
                  ->where('strMaterialID', $materialID)
                  ->pluck('strMaterialDesc')
                  ->toArray();
        array_push($arrMatName,$getMatName);
        array_push($arrMatDesc,$getMatDesc);
        $counter = DB::table('tblpurchasedetail')->where('strMaterialID', $materialID)->count();

        $arrCounter[$ct] = $counter;
        $ct = $ct + 1;
      }

      // dd($getProdName);

      return Response::json(array('material'=>$arrMatName, 'materialDesc'=>$arrMatDesc, 'count'=>$arrCounter));
    }

    public function viewTable3Info()
    {
      $mostJobs = DB::table('tbljobticket')
              ->select('strEmployeeID')
              ->groupBy('strEmployeeID')
              ->orderByRaw('COUNT(*) DESC')
              ->pluck('strEmployeeID')
              ->toArray();

      $arrEmployeeName = [];
      $arrCounter = [];
      $ct = 0;
      foreach ($mostJobs as $empID) {
        $getEmpName = DB::table('tblemployee')
                  ->select('strEmployeeFirst')
                  ->where('strEmployeeID', $empID)
                  ->pluck('strEmployeeFirst')
                  ->toArray();

        array_push($arrEmployeeName,$getEmpName);
        $counter = DB::table('tbljobticket')->where('strEmployeeID', $empID)->count();

        $arrCounter[$ct] = $counter;
        $ct = $ct + 1;
      }

      return Response::json(array('empname'=>$arrEmployeeName,'count'=>$arrCounter));
    }

    public function viewTable4Info()
    {
      $mostCustomer = DB::table('tblcustpurchase')
              ->select('strCustomerID')
              ->groupBy('strCustomerID')
              ->orderByRaw('COUNT(*) DESC')
              ->pluck('strCustomerID')
              ->toArray();

      $arrCustName = [];
      $arrCounter = [];
      $ct = 0;
      foreach ($mostCustomer as $custID) {
        $getProdName = DB::table('tblcustomer')
                  ->select('strCompanyName')
                  ->where('strCustomerID', $custID)
                  ->pluck('strCompanyName')
                  ->toArray();

        array_push($arrCustName,$getProdName);
        $counter = DB::table('tblcustpurchase')->where('strCustomerID', $custID)->count();

        $arrCounter[$ct] = $counter;
        $ct = $ct + 1;
      }

      // dd($getProdName);

      return Response::json(array('customer'=>$arrCustName, 'count'=>$arrCounter));
    }
}
