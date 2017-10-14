<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;

class MatRequisitController extends Controller
{

  public function viewMaterialRequisit()
  {
    $matreqView = DB::table('tblmaterialrequisition')
                ->leftjoin('tblemployee', 'tblemployee.strEmployeeID', 'tblmaterialrequisition.strEmployeeID')
                ->get();

      return Response::json($matreqView);
  }

  public function getJoborder(Request $request)
  {
    $jobOrders = DB::table('tbljoborder')
      // ->where('tblquotejoborder.strJobOrderID', $request->input('job_id'))
      ->get();

    return Response::json($jobOrders);
  }

  public function getEmployee()
  {
    $employees = DB::table('tblemployee')
      ->where('tblemployee.strStatus', 'Active')
      ->get();

    return Response::json($employees);
  }

  public function getMaterial()
  {
    $materials = DB::table('tblmaterial')
      ->where('tblmaterial.strStatus', 'Active')
      ->get();

    return Response::json($materials);
  }

  public function matReqModal(Request $request)
  {
    $modalinfo = DB::table('tbljoborder')
      ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
      ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
      ->leftjoin('tblcosting', 'tblcosting.strCostingID', 'tblquotation.strCostingID')
      ->leftjoin('tblcostingmaterial', 'tblcostingmaterial.strCostingID', 'tblcosting.strCostingID')
      ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblcostingmaterial.strMaterialID')
      ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblcosting.strProductID')
      ->leftjoin('tblmatspec', 'tblmatspec.strMatspecID', 'tblcosting.strMatspecID')
      ->where('tbljoborder.strJobOrdID', $request->input('job_id'))
      ->get();
      // dd($modalinfo);

    return Response::json($modalinfo);
  }

  public function matVar(Request $request)
  {
    $matVariant = DB::table('tblmaterialdetail')
      ->leftjoin('tblmaterialvariant', 'tblmaterialvariant.strMaterialVariantID', 'tblmaterialdetail.strMaterialVariantID')
      ->where('tblmaterialdetail.strMaterialID', $request->input('mat_id'))
      ->get();

    return Response::json($matVariant);
  }

  public function addMatReq(Request $request)
  {
    // dd($request->all());
    $id = str_random(10);

    $emp = DB::table('tblemployee')
      ->where('tblemployee.strEmployeeID', $request->input('emp_name'))
      ->first()
      ->strEmployeeID;

      // dd($emp);

    $matreq = DB::table('tblmaterialrequisition')
      ->insert([
        'strMaterialRequisitionID' => $id,
        'strJobOrdID' => $request->input('job_id'),
        'strEmployeeID' => $request->input('emp_name'),
        'dtNeeded' => $request->input('date'),
      ]);

    $matreqView = DB::table('tblmaterialrequisition')
                ->where('tblmaterialrequisition.strMaterialRequisitionID', '=' , $id)
                ->get();

      return Response::json($matreqView);
  }

}
