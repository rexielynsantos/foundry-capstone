<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\RolesRequest;
use App\Http\Controllers\Controller;
use App\Models\UserRole;
use DB;
use Response;

class UserRoleController extends Controller
{
  public function viewUserRole()
  {
    $product = DB::table('tbluseraction')
                ->where('tbluseraction.strStatus','Active')
                ->leftjoin('tblmodule','tblmodule.strModuleID','=','tbluseraction.strModuleID')
                ->select('tbluseraction.*','tblmodule.strModuleName')
                ->get();
    $module = DB::table('tblmodule')
                ->where('tblmodule.strStatus', '=' , 'Active')
                ->get();
      // return Response::json($product);
      return view('Utilities.userRole')
      ->with('userRole',$product)
      ->with('module', $module);
  }
  public function addUserRole(RolesRequest $request)
  {
    try {
      DB::beginTransaction();
       $id = str_random(10);
      DB::table('tbluseraction')->insert([
      'strUserActionID' => $id,
      'strUserActionName' => $request->input('role_name'),
      'strUserActionDesc' => $request->input('role_desc'),
      'strModuleID' => $request->input('mod_id'),
      'strStatus' => 'Active',
    ]);
    DB::commit();
    $product = DB::table('tbluseraction')
                ->leftjoin('tblmodule','tblmodule.strModuleID','=','tbluseraction.strModuleID')
                ->select('tbluseraction.*','tblmodule.strModuleName')
                ->where('tbluseraction.strUserActionID', $id)
                ->get();
    return Response::json($product);

    } catch (\Illuminate\Database\QueryException $e) {
      DB::rollback();
      return 'error';
    }

  }
  public function editUserRole(Request $request)
  {
    $product = DB::table('tbluseraction')
                ->where('tbluseraction.strUserActionID', $request->input('role_id'))
                ->get();
    return Response::json($product);
  }
  public function updateUserRole(RolesRequest $request)
  {
    try {
      DB::beginTransaction();
      DB::table('tbluseraction')
    ->where('tbluseraction.strUserActionID', $request->input('role_id'))
    ->update([
      'strUserActionName' => $request->input('role_name'),
      'strUserActionDesc' => $request->input('role_desc'),
      'strModuleID' => $request->input('mod_id'),
    ]);
    DB::commit();
    $userRole = DB::table('tbluseraction')
                ->where('tbluseraction.strUserActionID', $request->input('role_id'))
                ->get();
    $module = DB::table('tblmodule')
                ->where('tblmodule.strStatus', '=' , 'Active')
                ->get();
    return Response::json($userRole);

    } catch (\Illuminate\Database\QueryException $e) {
      DB::rollback();
      return 'error';
    }

  }
  public function deleteUserRole(Request $request)
  {
    foreach ($request->input('role_id') as $userRoleID) {
      DB::table('tbluseraction')
      ->where('tbluseraction.strUserActionID', $userRoleID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }

  public function reactivateUserRole()
  {
    $product = DB::table('tbluseraction')
                ->where('tbluseraction.strStatus','Inactive')
                ->get();
      // return Response::json($product);
      return view('Reactivation.userRoleReactivation')
      ->with('userRole',$product);
  }

  public function activateUserRole(Request $request)
  {
    foreach ($request->input('role_id') as $userRoleID) {
      DB::table('tbluseraction')
      ->where('tbluseraction.strUserActionID', $userRoleID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }
  public function statusUserRole(Request $request)
  {
    $status = UserRole::where('strUserActionName', '=', $request->input('role_name'))->get();


    return response()->json($status);
  }

  public function activeUserRole(Request $request)
  {
      UserRole::where('strUserActionName', '=', $request->input('role_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $user = UserRole::with('module')->where('strUserActionName', $request->role_name)->first();
      return $user;

  }

}
