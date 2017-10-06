<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ModuleRequest;
use App\Http\Controllers\Controller;
use App\Models\Module;
use DB;
use Response;
class ModuleController extends Controller
{
  public function getModuleMax(){
    $id = DB::table('tblmodule')
          ->select('strModuleID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strModuleID', 'desc')
          ->first();
    
    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strModuleID;

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
      $somenew = 'MOD00001';
     }
    return response()->json($somenew);
  }

  public function viewModule()
  {
    $product = DB::table('tblmodule')
                ->leftjoin('tbldepartment','tbldepartment.strDepartmentID','=','tblmodule.strDepartmentID')
                ->select('tblmodule.*','tbldepartment.strDepartmentName')
                ->where('tblmodule.strStatus', '=' , 'Active')
                ->get();
    $department = DB::table('tbldepartment')
                ->where('tbldepartment.strStatus', '=' , 'Active')
                ->get();
      // return Response::json($product);
      return view('Utilities.module')
      ->with('module',$product)
      ->with('dept',$department);
  }
  public function addModule(ModuleRequest $request)
  {
      try {
        DB::beginTransaction();
        $array = ['Draft','For Review','For Revision','Revised','Approved','Expired'];
      $id = $request->input('id');

      DB::table('tblmodule')->insert([
        'strModuleID' => $id,
        'strModuleName' => $request->input('mod_name'),
        'strModuleDesc' => $request->input('mod_desc'),
        'strDepartmentID' => $request->input('dept_id'),
        'created_at' => $request->input('created_at'),
        'strStatus' => 'Active',
      ]);

      foreach ($array as $value) {
          $work_id = str_random(10);
          DB::table('tblworkflow')->insert([
            'strWorkflowID' => $work_id,
            'strWorkflowName' => $value,
            'strModuleID' => $id,
            'boolDraftIsChecked' => 0,
            'boolForRevisionIsChecked' => 0,
            'boolForReviewIsChecked' => 0,
            'boolRevisedIsChecked' => 0,
            'boolApprovedIsChecked' => 0,
            'boolExpiredIsChecked' => 0
        ]);
      }

      DB::commit();
      $product = DB::table('tblmodule')
                  ->leftjoin('tbldepartment','tbldepartment.strDepartmentID','=','tblmodule.strDepartmentID')
                  ->select('tblmodule.*','tbldepartment.strDepartmentName')
                  ->where('tblmodule.strModuleID', '=' , $id)
                  ->get();
      return Response::json($product);
      } catch (\Illuminate\Database\QueryException $e) {
        DB::rollback();
        return 'error';
      }

  }
  public function editModule(Request $request)
  {
    $product = DB::table('tblmodule')
                ->where('tblmodule.strModuleID', '=' , $request->input('mod_id'))
                ->get();
    return Response::json($product);
  }
  public function updateModule(ModuleRequest $request)
  {
    try {
      DB::beginTransaction();
      DB::table('tblmodule')
    ->where('tblmodule.strModuleID', '=', $request->input('mod_id'))
    ->update([
      'strModuleName' => $request->input('mod_name'),
      'strModuleDesc' => $request->input('mod_desc'),
      'strDepartmentID' => $request->input('dept_id'),
    ]);
   DB::commit();
   $module = DB::table('tblmodule')
                ->leftjoin('tbldepartment','tbldepartment.strDepartmentID','=','tblmodule.strDepartmentID')
                ->select('tblmodule.*','tbldepartment.strDepartmentName')
                ->where('tblmodule.strModuleID','=', $request->input('mod_id'))
                ->get();
    $department = DB::table('tbldepartment')
                ->where('tbldepartment.strStatus', '=', 'Active')
                ->get();
    return Response::json($module);
    } catch (\Illuminate\Database\QueryException $e) {
      DB::rollback();
      return 'error';
    }

  }
  public function deleteModule(Request $request)
  {
    foreach ($request->input('mod_id') as $moduleID) {
      DB::table('tblmodule')
      ->where('tblmodule.strModuleID', '=', $moduleID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }
  public function reactivateModule()
  {
    $product = DB::table('tblmodule')
                ->leftjoin('tbldepartment','tbldepartment.strDepartmentID','=','tblmodule.strDepartmentID')
                ->select('tblmodule.*','tbldepartment.strDepartmentName')
                ->where('tblmodule.strStatus', '=' , 'Inactive')
                ->get();
    $department = DB::table('tbldepartment')
                ->where('tbldepartment.strStatus', '=' , 'Inactive')
                ->get();
      // return Response::json($product);
      return view('Reactivation.moduleReactivation')
      ->with('module',$product)
      ->with('dept',$department);
  }
  public function activateModule(Request $request)
  {
    foreach ($request->input('mod_id') as $moduleID) {
      DB::table('tblmodule')
      ->where('tblmodule.strModuleID', '=', $moduleID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }
  public function statusModule(Request $request)
  {
    $status = Module::where('strModuleName', '=', $request->input('mod_name'))->get();


    return response()->json($status);
  }

  public function activeModule(Request $request)
  {
      Module::where('strModuleName', '=', $request->input('mod_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $module = Module::with('department')->where('strModuleName', $request->mod_name)->first();
      return $module;

  }
}
