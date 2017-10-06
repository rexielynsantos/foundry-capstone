<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;

class TermsConditionController extends Controller
{
  public function getTermsMax(){
    $id = DB::table('tbltermscondition')
          ->select('strTermID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strTermID', 'desc')
          ->first();
    
    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strTermID;

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
      $somenew = 'TERM00001';
     }
    return response()->json($somenew);
  }

  public function viewTerms()
  	{
    $module = DB::table('tblmodule')
                ->where('tblmodule.strStatus', '=' , 'Active')
                ->get();

      // return Response::json($module);
      return view('Utilities.termsCondition')
      ->with('module',$module);
 	}

  public function addTerms(Request $request)
  {
    
    $id = $request->input('id');
    DB::table('tbltermscondition')->insert([
      'strTermID' => $id,
      'strModuleID' => $request->input('module_id'),
      'strNote' => $request->input('term_note'),
      'created_at' => $request->input('created_at'),
      'strStatus' => 'Active',
    ]);
    $term = DB::table('tbltermscondition')
                  ->leftjoin('tblmodule','tblmodule.strModuleID','=','tbltermscondition.strModuleID')
                  ->select('tbltermscondition.*','tblmodule.strModuleName')
                  ->where('tbltermscondition.strTermID', '=' , $id)
                  ->get();
    return Response::json($term);

   

  }

  public function editTerms(Request $request)
  {
    $term = DB::table('tbltermscondition')
                ->where('tbltermscondition.strTermID', '=' , $request->input('term_id'))
                ->get();
    return Response::json($term);
  }
  public function updateTerms(Request $request)
  {
    try {
      DB::beginTransaction();
      DB::table('tbltermscondition')
    ->where('tbltermscondition.strTermID', '=', $request->input('term_id'))
    ->update([
      'strModuleID' => $request->input('module_id'),
      'strNote' => $request->input('term_note'),
    ]);
    DB::commit();
    $term = DB::table('tbltermscondition')
                ->where('tbltermscondition.strTermID', '=' , $request->input('term_id'))
                ->get();
    return Response::json($term);

    } catch (Exception $e) {
      DB::rollback();
      return 'error';
    }

  }

  public function deleteTerms(Request $request)
  {
    foreach ($request->input('term_id') as $termID) {
      DB::table('tbltermscondition')
      ->where('tbltermscondition.strTermID', '=', $termID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }
}
