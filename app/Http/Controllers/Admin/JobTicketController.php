<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\JobTicket;
use App\Models\JobOrder;
use App\Models\JobTicketDetail;
use App\Models\Product;
use App\Models\Stage;
use App\Models\StageDetail;
use App\Models\SubStage;
use App\Models\Employee;
use App\Models\ProductInspection;
use DB;
use Response;

class JobTicketController extends Controller
{
    public function viewJobTicket()
    {
      $job_tix = JobTicket::with(['product.details', 'employee', 'stage', 'substage', 'joborder'])->get();
      $product = Product::where('strStatus', 'Active')->get();
      $stage = Stage::with('substage.details1')->where('strStatus','Active')->get();
      $substage = SubStage::where('strStatus','Active')->get();
      $emp = Employee::where('strStatus','Active')->get();
      $joborder = JobOrder::get();

      return view('Transaction.jobtickets')
  	  ->with('jobticket', $job_tix)
  	  ->with('stage', $stage)
  	  ->with('substage', $substage)
  	  ->with('emp', $emp)
  	  ->with('prodd', $product)
      ->with('joborder', $joborder);
    }

    public function addJobTicket(Request $request){
      $id = str_random(10);
      if($request->input('substage_id') != ''){
        JobTicket::insert([
          'strJobTicketID' => $id,
          'strEmployeeID' => $request->input('emp_id'),
          'strStageID' => $request->input('stage_id'),
          'strSubStageID' => $request->input('substage_id'),
          'strJobOrdID' => $request->input('joborder_id'),
       		]);
      }
      if($request->input('substage_id') == ''){
        JobTicket::insert([
          'strJobTicketID' => $id,
          'strEmployeeID' => $request->input('emp_id'),
          'strStageID' => $request->input('stage_id'),
       		]);
      }

      $time = $request->input('time_data');
      $ctr = 0;
      if($request->input('prod_data') != ''){
        foreach($request->input('prod_data') as $product){
          JobTicketDetail::insert([
            'strJobTicketID' => $id,
            'strProductID' => $product[0],
            'timeStarted' => $time[$ctr],
          ]);
          $ctr = $ctr + 1;
        }
      }


      //PRODUCT INSPECTION
      foreach($request->input('prod_data') as $product){
        $ins = ProductInspection::where('strProductID', '=', $product[0])->first();
        if($ins == ''){
          $insID = str_random(10);
          ProductInspection::insert([
            'strProdInspectionID' => $insID,
            'strProductID' => $product[0],
          ]);
        }
      }

      $jobticket = JobTicket::with(['product.details', 'employee', 'stage', 'substage', 'joborder'])->where('strJobTicketID', $id)->first();
      return $jobticket;
    }

    public function editJobTicket(Request $request){
      $jobticket = JobTicket::with(['product.details', 'employee', 'stage', 'substage', 'joborder'])->where('strJobTicketID', $request->input('jt_id'))->first();
      return $jobticket;
    }
    
    public function updateJobTicket(Request $request){  
       $timeEnd = $request->input('time_end');
       $timeStart = $request->input('time_start');
       $prodID = $request->input('prod_id');
       $prevJob = $request->input('prev_job');
       $addJob = $request->input('add_job');
       $job = $request->input('job_finished');
       $id = $request->input('jt_id');
       $ctr = 0;
       $ctrr = 0;

       if($request->input('prod_data') != ''){
          JobTicketDetail::where('strJobTicketID', '=', $id)->delete();
          foreach($request->input('prod_data') as $prod){
           JobTicketDetail::insert([
               'strJobTicketID' => $id,
               'strProductID' => $prodID[$ctrr],
               'timeStarted' => $timeStart[$ctrr],
               'dblJobFinished' => $job[$ctrr],
               'timeFinished' => $timeEnd
             ]);
            
            $ctrr = $ctrr + 1;
          }
        }

         foreach($request->input('prod_data') as $prod){
            $forIns = DB::table('tblprodinspection')
                        ->select('forInspection')
                        ->where('strProductID', '=', $prodID[$ctr])
                        ->first();
            $x = $forIns->forInspection;
            $total = $x + 0 + $addJob[$ctr];
            ProductInspection::where('strProductID', '=', $prodID[$ctr])
            ->update([
              'forInspection' => $total
            ]);
            $ctr = $ctr + 1;
         }
 
       $jobticket = JobTicket::with(['product.details', 'employee', 'stage', 'substage', 'joborder'])->where('tbljobticket.strJobTicketID', '=', $id)->first();
       return $jobticket;
    }

    public function getInspection(Request $request){
      // $forIns = '';
      // foreach($request->input('prod_data') as $prod){
            $forIns = DB::table('tblprodinspection')
                        ->where('strProductID', '=', $prod[0][0])
                        ->first();
      // }
      return $forIns;
    }

    public function getStage(Request $request)
    {
      $substage = DB::table('tblsubstage')
                ->join('tblstagedetail', 'tblstagedetail.strSubStageID', '=', 'tblsubstage.strSubStageID')
                ->select('tblsubstage.*')
                ->where('tblstagedetail.strStageID', '=', $request->input('stage_id'))
                ->get();

      return Response::json(['substage'=> $substage]);
    }

   public function getProduct(Request $request)
   {
      $pd = DB::table('tblproduct')
      ->join('tblproducttype', 'tblproducttype.strProductTypeID', '=', 'tblproduct.strProductTypeID')
      ->select('tblproduct.strProductID', 'tblproduct.strProductName', 'tblproducttype.strProductTypeName')
      ->where('tblproduct.strProductID', '=', $request->input('prodct_data'))
      ->get();

      return Response::json($pd);
   }

   public function getProducts()
   {
      $product = Product::where('strStatus', 'Active')->get();

      return response()->json($product);
   }

}
