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
  public function viewDepartment()
  {
    $product = Department::where('tbldepartment.strStatus', '=' , 'Active')
                ->get();
      // return Response::json($product);
      return view('Users.department')
      ->with('department',$product);
  }
  public function addDepartment(DepartmentRequest $request)
  {
    try {
      DB::beginTransaction();
      $id = str_random(10);
      DB::table('tbldepartment')->insert([
      'strDepartmentID' => $id,
      'strDepartmentName' => $request->input('department_name'),
      'strDepartmentDesc' => $request->input('department_desc'),
      'strStatus' => 'Active',
    ]);
    DB::commit();
    $product = DB::table('tbldepartment')
                ->where('tbldepartment.strDepartmentID', '=' , $id)
                ->get();
    return Response::json($product);

    } catch (\Illuminate\Database\QueryException $e) {
      DB::rollback();
      return 'error';
    }

  }
  public function editDepartment(Request $request)
  {
    $product = DB::table('tbldepartment')
                ->where('tbldepartment.strDepartmentID', '=' , $request->input('department_id'))
                ->get();
    return Response::json($product);
  }
  public function updateDepartment(DepartmentRequest $request)
  {
    try {
      DB::beginTransaction();
      DB::table('tbldepartment')
    ->where('tbldepartment.strDepartmentID', '=', $request->input('department_id'))
    ->update([
      'strDepartmentName' => $request->input('department_name'),
      'strDepartmentDesc' => $request->input('department_desc'),
    ]);
    DB::commit();
    $department = DB::table('tbldepartment')
                ->where('tbldepartment.strDepartmentID', '=' , $request->input('department_id'))
                ->get();
    return Response::json($department);

    } catch (Exception $e) {
      DB::rollback();
      return 'error';
    }

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
