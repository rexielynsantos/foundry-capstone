<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EmployeeRequest;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Department;
use App\Models\JobTitle;
use DB;
use Response;
class EmployeeController extends Controller
{
  public function viewEmployee(){

    $employee = Employee::where('strStatus', 'Active')->get();
    $department = Department::where('strStatus', 'Active')->get();
    $jobTitle = JobTitle::where('strStatus', 'Active')->get();

      // return Response::json($product);
      return view('Users.employee')
      ->with('employee',$employee)
      ->with('department',$department)
      ->with('jobTitle',$jobTitle);
  }

  public function addEmployee(EmployeeRequest $request)
  {
      $id = str_random(10);
      $imageName = "";
      $tempID="";
      if($request->hasFile('emp_image'))
        {
          $tempID = $id.'.'.$request->emp_image->getClientOriginalExtension();
          $imageName = $request->file('emp_image')->storeAs(
              'public/employee', $tempID
          );
        }

      Employee::insert([
      'strEmployeeID' => $id,
      'strEmployeeLast' => $request->input('emp_last'),
      'strEmployeeFirst' => $request->input('emp_first'),
      'strEmployeeMiddle' => $request->input('emp_middle'),
      'strEmployeeContact' => $request->input('emp_contact'),
      'strEmployeeEmail' => $request->input('emp_email'),
      'strJobTitleID' => $request->input('jobtitle_id'),
      'strDepartmentID' => $request->input('dept_id'),
      'strEmployeeImagePath' => $imageName,
      'strTempImage' => $tempID,
      'strStatus' => 'Active',
    ]);

      $employee = Employee::where('strEmployeeID', $id)->with(['jobtitle','department'])->first();
      return $employee;
    }

    public function editEmployee(Request $request)
    {
      $employee = Employee::where('strEmployeeID', $request->emp_id)->get();
      return $employee;
    }

    public function updateEmployee(EmployeeRequest $request)
    {
       // try {
       //   DB::beginTransaction();
         DB::table('tblemployee')
      ->where('tblemployee.strEmployeeID', '=', $request->input('emp_id'))
      ->update([
        'strEmployeeLast' => $request->input('emp_last'),
        'strEmployeeFirst' => $request->input('emp_first'),
        'strEmployeeMiddle' => $request->input('emp_middle'),
        'strEmployeeContact' => $request->input('emp_contact'),
        'strEmployeeEmail' => $request->input('emp_email'),

        'strJobTitleID' => $request->input('jobtitle_id'),
        'strDepartmentID' => $request->input('dept_id')
      ]);


      if($request->hasFile('emp_image'))
        {
          $id = str_random(10);
          $employee = DB::table('tblemployee')
                ->where('tblemployee.strEmployeeID', $request->input('emp_id'))
                ->first();
          Storage::delete($employee->strEmployeeImagePath);

          $tempID = $id.'.'.$request->emp_image->getClientOriginalExtension();
          $imageName = $request->file('emp_image')->storeAs(
              'public/employee', $tempID
          );

        DB::table('tblemployee')
          ->where('tblemployee.strEmployeeID', '=', $request->input('emp_id'))
          ->update([
            'strEmployeeImagePath' => $imageName,
            'strTempImage' => $tempID,
            ]);
        }
      // DB::commit();
      $employee = DB::table('tblemployee')
                ->leftjoin('tbldepartment','tbldepartment.strDepartmentID','=','tblemployee.strDepartmentID')
                ->leftjoin('tbljobtitle','tbljobtitle.strJobTitleID','=','tblemployee.strJobTitleID')
                ->select('tblemployee.*','tbldepartment.strDepartmentName',
                         'tbljobtitle.strJobTitleName')
                ->where('tblemployee.strEmployeeID', $request->input('emp_id'))
                ->get();

      return Response::json($employee);
    }

    public function deleteEmployee(Request $request)
    {
      foreach ($request->input('emp_id') as $employeeID) {
       Employee::where('strEmployeeID', $employeeID)
        ->update([
          'strStatus' => 'Inactive',
        ]);
      }
    }
    // REACTIVATE VIEW
    public function reactivateEmployee(){
      $product = DB::table('tblemployee')
                  ->leftjoin('tbldepartment','tbldepartment.strDepartmentID','=','tblemployee.strDepartmentID')
                  ->leftjoin('tbljobtitle','tbljobtitle.strJobTitleID','=','tblemployee.strJobTitleID')
                  ->select('tblemployee.*','tbldepartment.strDepartmentName',
                           'tbljobtitle.strJobTitleName')
                  ->where('tblemployee.strStatus', '=' , 'InActive')
                  ->get();
        $department = DB::table('tbldepartment')
                    ->where('tbldepartment.strStatus', '=' , 'Active')
                    ->get();
        $jobTitle = DB::table('tbljobtitle')
                    ->where('tbljobtitle.strStatus', '=' , 'Active')
                    ->get();
        // return Response::json($product);
        return view('Reactivation.employeeReactivate')
        ->with('employeer',$product)
        ->with('departmentr',$department)
        ->with('jobTitler',$jobTitle);
    }

    //ACTIVATE EMPLOYEE
    public function activateEmployee(Request $request)
    {
      foreach ($request->input('emp_id') as $employeeID) {
        DB::table('tblemployee')
        ->where('tblemployee.strEmployeeID', '=', $employeeID)
        ->update([
          'strStatus' => 'Active',
        ]);
      }
      // echo "HHAHAHA";
    }
    // public function statusEmployee(Request $request)
    // {
    //   $status = Employee::where('strSupplierName', '=', $request->input('supplier_name'))->get();
    //
    //
    //   return response()->json($status);
    // }
    //
    // public function activeEmployee(Request $request)
    // {
    //     Employee::where('strSupplierName', '=', $request->input('supplier_name'))
    //
    //     ->update([
    //       'strStatus' => 'Active',
    //     ]);
    //
    //     $emp = Employee::where('strSupplierName', $request->supplier_name)->first();
    //     return $emp;
    //
    // }

}
