<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SubStageRequest;
use App\Http\Controllers\Controller;
use App\Models\SubStage;
use DB;
use Response;

class SubStageController extends Controller
{

  public function getSubStageMax(){
    $id = DB::table('tblsubstage')
          ->select('strSubStageID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strSubStageID', 'desc')
          ->first();

    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strSubStageID;

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
      $somenew = 'SUBST00001';
     }
    return response()->json($somenew);
  }

  public function viewSubStage()
  {
    $product = SubStage::where('strStatus','Active')->get();

      // return Response::json($product);
      return view('Utilities.substage')
      ->with('substage',$product);
  }
  public function addSubStage(SubStageRequest $request)
  {
     $id = $request->input('id');
     SubStage::insert([
      'strSubStageID' => $id,
      'strSubStageName' => $request->input('substage_name'),
      'dbltimeRequired' => $request->input('process_time'),
      'strSubStageDesc' => $request->input('substage_desc'),
      'created_at' => $request->input('created_at'),
      'strStatus' => 'Active',
      ]);
     $sub_stage = SubStage::where('strSubStageID', $id)->get();
     return $sub_stage;
    // try {
    //   DB::beginTransaction();
    //   $id = str_random(10);
    //   SubStage::insert([
    //     'strSubStageID' => $id,
    //     'strSubStageName' => $request->input('substage_name'),
    //     'strSubStageDesc' => $request->input('substage_desc'),
    //     'strStatus' => 'Active',
    //   ]);
    // DB::commit();
    // $product = DB::table('tblsubstage')
    //               ->where('tblsubstage.strStatus', '=' , 'Active')
    //               ->get();
    // return Response::json($product);
    // } catch (\Illuminate\Database\QueryException $e) {
    //   DB::rollback();
    //   return 'error';
    // }

  }
  public function editSubStage(Request $request)
  {
    $sub_stage = SubStage::where('strSubStageID', $request->substage_id)->get();
    return $sub_stage;
    // $product = DB::table('tblsubstage')
    //             ->where('tblsubstage.strSubStageID', '=' , $request->input('substage_id'))
    //             ->get();
    // return Response::json($product);
  }
   public function updateSubStage(SubStageRequest $request)
  {
    SubStage::where('strSubStageID', $request->substage_id)
    ->update([
      'strSubStageName' => $request->input('substage_name'),
      'dbltimeRequired' => $request->input('process_time'),
      'strSubStageDesc' => $request->input('substage_desc'),
      ]);
    $sub_stage = SubStage::where('strSubStageID', $request->substage_id)->get();
    return $sub_stage;
    // try {
    //   DB::beginTransaction();
    //   DB::table('tblsubstage')
    //   ->where('tblsubstage.strSubStageID', '=', $request->input('substage_id'))
    //   ->update([
    //     'strSubStageName' => $request->input('substage_name'),
    //     'strSubStageDesc' => $request->input('substage_desc'),
    //   ]);
    //   DB::commit();
    //   $substage = DB::table('tblsubstage')
    //               ->where('tblsubstage.strSubStageID', '=' , $request->input('substage_id'))
    //               ->get();
    //   return Response::json($substage);
    // } catch (\Illuminate\Database\QueryException $e) {
    //   DB::rollback();
    //   return 'error';
    // }
  }
   public function deleteSubStage(Request $request)
  {
    foreach ($request->input('substage_id') as $subStageID) {
      DB::table('tblsubstage')
      ->where('tblsubstage.strSubStageID', '=', $subStageID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }

  public function reactivateSubStage()
{
 $product = DB::table('tblsubstage')
                ->where('tblsubstage.strStatus', '=' , 'Inactive')
                ->get();

    // return Response::json($product);
    return view('Reactivation.substageReactivation')
    ->with('substage',$product);
}

  public function activateSubstage(Request $request)
  {
    foreach ($request->input('substage_id') as $actID) {
      DB::table('tblsubstage')
      ->where('tblsubstage.strSubStageID', $actID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }

  public function statusSubstage(Request $request)
  {
    $status = SubStage::where('strSubStageName', '=', $request->input('substage_name'))->get();


    return response()->json($status);
  }

  public function activeSubstage(Request $request)
  {
      SubStage::where('strSubStageName', '=', $request->input('substage_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $substage = SubStage::where('strSubStageName', $request->substage_name)->first();
      return $substage;

  }
}
