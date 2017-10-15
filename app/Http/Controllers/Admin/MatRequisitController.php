<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;

class MatRequisitController extends Controller
{
  public function getMaterialRequisitMax(){
    $id = DB::table('tblmaterialrequisition')
          ->select('strMaterialRequisitionID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strMaterialRequisitionID', 'desc')
          ->first();
    
    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strMaterialRequisitionID;

      $arrID = str_split($idd);
    
       
    
       for($ctr = count($arrID) - 1; $ctr >= 0; $ctr--)
       {
         $new = $arrID[$ctr];
    
         if($boolAdd)
         {
    
           if(is_numeric($new) || $new == '0')
           {
             if($new == '9')
             {
               $new = '0';
               $arrNew[$ctr] = $new;
             }
             else
             {
               $new = $new + 1;
               $arrNew[$ctr] = $new;
               $boolAdd = FALSE;
             }//else
           }//if(is_numeric($new))
           else
           {
             $arrNew[$ctr] = $new;
           }//else
         }//if ($boolAdd)
    
         $arrNew[$ctr] = $new;
       }//for
    
       for($ctr2 = 0; $ctr2 < count($arrID); $ctr2++)
       {
         $somenew = $somenew . $arrNew[$ctr2] ;
      }
     }
     else{
      $somenew = 'MR00001';
     }
    return response()->json($somenew);
  }

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
      ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
      ->leftjoin('tblcosting', 'tblcosting.strCostingID', 'tblquotation.strCostingID')
      ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblcosting.strProductID')
      ->leftjoin('tblmatspec', 'tblmatspec.strMatspecID', 'tblcosting.strMatspecID')
      ->leftjoin('tblcostingmaterial', 'tblcostingmaterial.strCostingID', 'tblcosting.strCostingID')
      ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblcostingmaterial.strMaterialID')
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
    $id = $request->input('id');

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
        'created_at' => $request->input('created_at')
      ]);

    $matreqView = DB::table('tblmaterialrequisition')
                ->where('tblmaterialrequisition.strMaterialRequisitionID', '=' , $id)
                ->get();

      return Response::json($matreqView);
  }

}
 