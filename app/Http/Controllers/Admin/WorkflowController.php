<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;

class WorkflowController extends Controller
{
  public function viewWorkflow()
  {        
      $module = DB:: table('tblmodule')
                ->where('strStatus','Active')
                ->get();      
      return view('Utilities.workflow')            
      ->with('module',$module);

  }

  public function changeModule(Request $request){
    
    $draft = DB::table('tblworkflow')
              ->where('strWorkflowName','Draft')
              ->where('strModuleID',$request->module_id)
              ->first();
    $review = DB::table('tblworkflow')
              ->where('strWorkflowName','For Review')
              ->where('strModuleID',$request->module_id)
              ->first();
    $revision = DB::table('tblworkflow')
              ->where('strWorkflowName','For Revision')
              ->where('strModuleID',$request->module_id)
              ->first();
    $revised = DB::table('tblworkflow')
              ->where('strWorkflowName','Revised')
              ->where('strModuleID',$request->module_id)
              ->first();
    $aprroved = DB::table('tblworkflow')
              ->where('strWorkflowName','Approved')
              ->where('strModuleID',$request->module_id)
              ->first();
    $expired = DB::table('tblworkflow')
              ->where('strWorkflowName','Expired')
              ->where('strModuleID',$request->module_id)
              ->first();
    

    return response()->json([
      'Draft' => $draft,
      'Review' => $review,
      'Revision' => $revision,
      'Revised' => $revised,
      'Approved' => $aprroved,
      'Expired' => $expired
    ]);
  }

  public function update(Request $request){    
        DB::table('tblworkflow')
          ->where('strWorkflowID', $request->draftArray[0])
          ->update([            
            'boolDraftIsChecked' => $request->draftArray[1] === 'true'? true: false,
            'boolForReviewIsChecked' => $request->draftArray[2] === 'true'? true: false,
            'boolForRevisionIsChecked' => $request->draftArray[3] === 'true'? true: false, 
            'boolRevisedIsChecked' => $request->draftArray[4] === 'true'? true: false,
            'boolApprovedIsChecked' => $request->draftArray[5] === 'true'? true: false,
            'boolExpiredIsChecked' => $request->draftArray[6] === 'true'? true: false,
          ]);
  
        DB::table('tblworkflow')
          ->where('strWorkflowID', $request->reviewArray[0])
          ->update([            
            'boolDraftIsChecked' => $request->reviewArray[1] === 'true'? true: false,
            'boolForReviewIsChecked' => $request->reviewArray[2] === 'true'? true: false,
            'boolForRevisionIsChecked' => $request->reviewArray[3] === 'true'? true: false, 
            'boolRevisedIsChecked' => $request->reviewArray[4] === 'true'? true: false,
            'boolApprovedIsChecked' => $request->reviewArray[5] === 'true'? true: false,
            'boolExpiredIsChecked' => $request->reviewArray[6] === 'true'? true: false,
          ]);
    
        DB::table('tblworkflow')
          ->where('strWorkflowID', $request->revisionArray[0])
          ->update([            
            'boolDraftIsChecked' => $request->revisionArray[1] === 'true'? true: false,
            'boolForReviewIsChecked' => $request->revisionArray[2] === 'true'? true: false,
            'boolForRevisionIsChecked' => $request->revisionArray[3] === 'true'? true: false, 
            'boolRevisedIsChecked' => $request->revisionArray[4] === 'true'? true: false,
            'boolApprovedIsChecked' => $request->revisionArray[5] === 'true'? true: false,
            'boolExpiredIsChecked' => $request->revisionArray[6] === 'true'? true: false,
          ]);

        
        DB::table('tblworkflow')
          ->where('strWorkflowID', $request->revisedArray[0])
          ->update([            
            'boolDraftIsChecked' => $request->revisedArray[1] === 'true'? true: false,
            'boolForReviewIsChecked' => $request->revisedArray[2] === 'true'? true: false,
            'boolForRevisionIsChecked' => $request->revisedArray[3] === 'true'? true: false, 
            'boolRevisedIsChecked' => $request->revisedArray[4] === 'true'? true: false,
            'boolApprovedIsChecked' => $request->revisedArray[5] === 'true'? true: false,
            'boolExpiredIsChecked' => $request->revisedArray[6] === 'true'? true: false,
          ]);
    
        DB::table('tblworkflow')
          ->where('strWorkflowID', $request->aprrovedArray[0])
          ->update([            
            'boolDraftIsChecked' => $request->aprrovedArray[1] === 'true'? true: false,
            'boolForReviewIsChecked' => $request->aprrovedArray[2] === 'true'? true: false,
            'boolForRevisionIsChecked' => $request->aprrovedArray[3] === 'true'? true: false, 
            'boolRevisedIsChecked' => $request->aprrovedArray[4] === 'true'? true: false,
            'boolApprovedIsChecked' => $request->aprrovedArray[5] === 'true'? true: false,
            'boolExpiredIsChecked' => $request->aprrovedArray[6] === 'true'? true: false,
          ]);
  
        DB::table('tblworkflow')
          ->where('strWorkflowID', $request->expiredArray[0])
          ->update([            
            'boolDraftIsChecked' => $request->expiredArray[1] === 'true'? true: false,
            'boolForReviewIsChecked' => $request->expiredArray[2] === 'true'? true: false,
            'boolForRevisionIsChecked' => $request->expiredArray[3] === 'true'? true: false, 
            'boolRevisedIsChecked' => $request->expiredArray[4] === 'true'? true: false,
            'boolApprovedIsChecked' => $request->expiredArray[5] === 'true'? true: false,
            'boolExpiredIsChecked' => $request->expiredArray[6] === 'true'? true: false,
          ]);
    

    return response()->json('Succesfully updated');
  }

}
