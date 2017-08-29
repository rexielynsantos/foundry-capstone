<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;

class MatRequisitController extends Controller
{
  public function getJoborder(Request $request)
  {
    $jobOrders = DB::table('tblquotejoborder')
      ->where('tblquotejoborder.strJobOrderID', $request->input('job_id'))
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
    $modalinfo = DB::table('tblmatspecdetail')
      ->leftjoin('tblquotejoborder', 'tblmatspecdetail.strMatspecID', 'tblmatspecdetail.strMatspecID')
      ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblquotejoborder.strProductID')
      ->leftjoin('tblmatspec', 'tblmatspec.strMatspecID', 'tblmatspecdetail.strMatspecID')
      ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblmatspecdetail.strMaterialID')
      ->where('tblquotejoborder.strJobOrderID', $request->input('job_id'))
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
}
