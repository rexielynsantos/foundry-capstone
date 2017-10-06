<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StageRequest;
use App\Http\Controllers\Controller;
use App\Models\Stage;
use App\Models\StageDetail;
use App\Models\SubStage;
use DB;
use Response;


class StageController extends Controller
{
  public function getStageMax(){
    $id = DB::table('tblstage')
          ->select('strStageID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strStageID', 'desc')
          ->first();

    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strStageID;

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
      $somenew = 'ST00001';
     }
    return response()->json($somenew);
  }

  public function viewStage()
  {
    $stage = Stage::with('substage.details1')->where('strStatus','Active')->get();
 // return Response::json($stage);
      return view('Utilities.stage')
      ->with('stage',$stage);


  }
  public function addStage(StageRequest $request)
  {
     $id = $request->input('id');
     Stage::insert([
      'strStageID' => $id,
      'strStageName' => $request->stage_name,
      'strStageDesc' => $request->stage_desc,
      'dbltimeRequired' => $request->process_time,
      'created_at' => $request->input('created_at'),
      'strStatus' => 'Active'

      ]);
     if( $request->input('substage_data') != ''){
      foreach ($request->input('substage_data') as $stage) {
        StageDetail::insert([
          'strStageID' => $id,
          'strSubStageID' => $stage
        ]);
      }
    }

    $stage = Stage::with('substage.details1')->where('strStageID',$id)->first();
    return $stage;

  }
  public function editStage(Request $request)
  {

    $stage = Stage::with('substage.details1')->where('strStageID', $request->stage_id)->first();
    return $stage;
  }


  public function updateStage(StageRequest $request)
  {
   $stage = Stage::where('strStageID', $request->stage_id)
   ->update([
      'strStageName' => $request->stage_name,
      'dbltimeRequired' => $request->process_time,
      'strStageDesc' => $request->stage_desc,
      'strStatus' => 'Active'
    ]);
    StageDetail::where('strStageID', $request->stage_id)->delete();

    if( $request->input('substage_data') != ''){
      foreach ($request->input('substage_data') as $stage) {
        StageDetail::insert([
          'strStageID' => $request->stage_id,
          'strSubStageID' => $stage
        ]);
      }
    }
    $stage = Stage::with('substage.details1')
    ->where('tblstage.strStageID', $request->stage_id)
    ->first();
    return $stage;

  }


  public function deleteStage(Request $request)
  {
    foreach ($request->input('stage_id') as $stageID) {
      Stage::where('strStageID', $stageID)
      ->update([
        'strStatus'=> 'Inactive',
        ]);
    }
  }

  public function getAllSubstage(){
    $material = SubStage::where('strStatus', 'Active')->get();


    return response()->json($material);
  }

  public function reactivateStage()
  {
    $product = Stage::where('strStatus', 'Inactive')->get();

      return view('Reactivation.stageReactivation')
      ->with('stage',$product);
  }

  public function statusStage(Request $request)
  {
    $status = Stage::where('strStageName', '=', $request->input('stage_name'))->get();


    return response()->json($status);
  }

  public function activateStage(Request $request)
  {
    foreach ($request->input('stage_id') as $stageID) {
      Stage::where('strStageID', '=', $stageID)

      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }
  public function activeStage(Request $request)
  {
      Stage::where('strStageName', '=', $request->input('stage_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $stage = Stage::with('substage.details1')->where('strStageName', $request->stage_name)->first();
      return $stage;

  }
}
