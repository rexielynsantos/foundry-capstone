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

  public function getJobTitleMax(){
    $id = DB::table('tbljobtitle')
          ->select('strJobTitleID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strJobTitleID', 'desc')
          ->first();
    
    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strJobTitleID;

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
      $somenew = 'JT00001';
     }
    return response()->json($somenew);
  }

  public function viewJobTitle()
  {
    $product = JobTitle::where('strStatus', 'Active')->get();
      // return Response::json($product);
      return view('Users.jobTitle')
      ->with('jobTitle',$product);
  }
  public function addJobTitle(JobTitleRequest $request)
  {
      $id = $request->input('id');
      JobTitle::insert([
        'strJobTitleID' => $id,
        'strJobTitleName' => $request->input('jobtitle_name'),
        'strJobTitleDesc' => $request->input('jobtitle_desc'),
        'created_at' => $request->input('created_at'),
        'strStatus' => 'Active',
      ]);

    $jobTitle = JobTitle::where('strJobTitleID', $id)->first();
    return $jobTitle;

  }
  public function editJobTitle(Request $request)
  {
    $jobTitle = JobTitle::where('strJobTitleID', $request->jobtitle_id)->first();
    return $jobTitle;
  }
  public function updateJobTitle(JobTitleRequest $request)
  {
      
    JobTitle::where('strJobTitleID', $request->jobtitle_id)
    ->update([
      'strJobTitleName' => $request->input('jobtitle_name'),
      'strJobTitleDesc' => $request->input('jobtitle_desc'),
    ]);

    $jobTitle = JobTitle::where('strJobTitleID', $request->jobtitle_id)->first();
    return $jobTitle;

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
