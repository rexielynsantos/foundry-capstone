<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\JobTitleRequest;
use App\Http\Controllers\Controller;
use App\Models\JobTitle;
use DB;
use Response;
class JobTitleController extends Controller
{
  public function viewJobTitle()
  {
    $product = DB::table('tbljobtitle')
                ->where('tbljobtitle.strStatus', '=' , 'Active')
                ->get();
      // return Response::json($product);
      return view('Users.jobTitle')
      ->with('jobTitle',$product);
  }
  public function addJobTitle(JobTitleRequest $request)
  {
    try {
      DB::beginTransaction();
      $id = str_random(10);
      DB::table('tbljobtitle')->insert([
        'strJobTitleID' => $id,
        'strJobTitleName' => $request->input('jobtitle_name'),
        'strJobTitleDesc' => $request->input('jobtitle_desc'),
        'strStatus' => 'Active',
      ]);
    DB::commit();
    $product = DB::table('tbljobtitle')
                ->where('tbljobtitle.strJobTitleID', '=' , $id)
                ->get();
    return Response::json($product);
    } catch (\Illuminate\Database\QueryException $e) {
      DB::rollback();
      return 'error';
    }

  }
  public function editJobTitle(Request $request)
  {
    $product = DB::table('tbljobtitle')
                ->where('tbljobtitle.strJobTitleID', '=' , $request->input('jobtitle_id'))
                ->get();
    return Response::json($product);
  }
  public function updateJobTitle(JobTitleRequest $request)
  {
    try {
      DB::beginTransaction();
      DB::table('tbljobtitle')
    ->where('tbljobtitle.strJobTitleID', '=', $request->input('jobtitle_id'))
    ->update([
      'strJobTitleName' => $request->input('jobtitle_name'),
      'strJobTitleDesc' => $request->input('jobtitle_desc'),
    ]);
    DB::commit();
    $jobTitle = DB::table('tbljobtitle')
                ->where('tbljobtitle.strJobTitleID', '=' , $request->input('jobtitle_id'))
                ->get();
    return Response::json($jobTitle);
    } catch (\Illuminate\Database\QueryException $e) {
      DB::rollback();
      return 'error';
    }

  }

  public function deleteJobTitle(Request $request)
  {
    foreach ($request->input('jobtitle_id') as $jobTitleID) {
      DB::table('tbljobtitle')
      ->where('tbljobtitle.strJobTitleID', '=', $jobTitleID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }
  public function reactivateJobTitle()
  {
    $product = DB::table('tbljobtitle')
                ->where('tbljobtitle.strStatus', '=' , 'Inactive')
                ->get();
      // return Response::json($product);
      return view('Reactivation.jobTitleReactivation')
      ->with('jobTitle',$product);
  }
  public function activateJobTitle(Request $request)
  {
    foreach ($request->input('jobtitle_id') as $jobTitleID) {
      DB::table('tbljobtitle')
      ->where('tbljobtitle.strJobTitleID', '=', $jobTitleID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }
  public function statusJobTitle(Request $request)
  {
    $status = JobTitle::where('strJobTitleName', '=', $request->input('jobtitle_name'))->get();


    return response()->json($status);
  }

  public function activeJobTitle(Request $request)
  {
      JobTitle::where('strJobTitleName', '=', $request->input('jobtitle_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $jobtitle = JobTitle::where('strJobTitleName', $request->jobtitle_name)->first();
      return $jobtitle;

  }

}
