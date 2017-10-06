<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Http\Controllers\Controller;
use App\Models\Department;
use DB;
use Response;
class DepartmentController extends Controller
{

  public function getDepartmentMax(){
    $id = DB::table('tbldepartment')
          ->select('strDepartmentID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strDepartmentID', 'desc')
          ->first();
    
    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strDepartmentID;

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
      $somenew = 'DEPT00001';
     }
    return response()->json($somenew);
  }

  public function viewDepartment()
  {
    $product = Department::where('strStatus', 'Active')->get();
      // return Response::json($product);
      return view('Users.department')
      ->with('department',$product);
  }
  public function addDepartment(DepartmentRequest $request)
  {
    
    $id = $request->input('id');
    Department::insert([
      'strDepartmentID' => $id,
      'strDepartmentName' => $request->input('department_name'),
      'strDepartmentDesc' => $request->input('department_desc'),
      'created_at' => $request->input('created_at'),
      'strStatus' => 'Active',
    ]);

    $department = Department::where('strDepartmentID', $id)->get();
    return $department;
  }
  public function editDepartment(Request $request)
  {
    $department = Department::where('strDepartmentID', $request->department_id)->first();
    return $department;
  }
  public function updateDepartment(DepartmentRequest $request)
  {
    Department::where('strDepartmentID', $request->department_id)
    ->update([
      'strDepartmentName' => $request->input('department_name'),
      'strDepartmentDesc' => $request->input('department_desc'),
    ]);

    $department = Department::where('strDepartmentID', $request->department_id)->first();
    return $department;
  }

  public function deleteDepartment(Request $request)
  {
    foreach ($request->input('department_id') as $departmentID) {
      DB::table('tbldepartment')
      ->where('tbldepartment.strDepartmentID', '=', $departmentID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }

  public function reactivateDepartment()
  {
    $product = Department::where('strStatus', 'Inactive')->get();
      // return Response::json($product);
      return view('Reactivation.departmentReactivation')
      ->with('department',$product);
  }

  public function activateDepartment(Request $request)
  {
    foreach ($request->input('department_id') as $departmentID) {
    Department::where('tbldepartment.strDepartmentID', '=', $departmentID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }
  public function statusDepartment(Request $request)
  {
    $status = Department::where('strDepartmentName', '=', $request->input('department_name'))->get();


    return response()->json($status);
  }

  public function activeDepartment(Request $request)
  {
      Department::where('strDepartmentName', '=', $request->input('department_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $department = Department::where('strDepartmentName', $request->department_name)->first();
      return $department;

  }

}
