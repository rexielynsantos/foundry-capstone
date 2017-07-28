<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobTicket;
use App\Models\JobTicketDetail;
use App\Models\Product;
use App\Models\Stage;
use App\Models\StageDetail;
use App\Models\SubStage;
use App\Models\Employee;
use DB;
use Response;

class JobTicketController extends Controller
{
    public function viewJobTicket()
    {
      $job_tix = JobTicket::with('product.details')->get();
      $product = Product::where('strStatus', 'Active')->get();
      $stage = Stage::with('substage.details1')->where('strStatus','Active')->get();
      // $substage = SubStage::where('strStatus','Active')->get();
      $emp = Employee::where('strStatus','Active')->get();

      return view('Transaction.jobtickets')
  	  ->with('jobticket', $job_tix)
  	  ->with('stage', $stage)
  	  // ->with('substage', $substage)
  	  ->with('emp', $emp)
  	  ->with('prodd', $product);
    }

    public function addJobTicket(Request $request)
  	{
    $id = str_random(10);
    JobTicket::insert([
      'strJobTicketID' => $id,
      'strEmployeeID' => $request->input('emp_id'),
      'strStageID' => $request->input('stage_id'),
      'strSubStageID' => $request->input('substage_id'),
   		]);

    if($request->input('product_data') != ''){
      foreach($request->input('product_data') as $product){
        JobTicketDetail::insert([
          'strJobTicketID' => $id,
          'strProductID' => $product,
          'dblJobFinished' => $request->input('qty_finished'),
          'timeStarted' => $request->input('time_started'),
          'timeFinished' => $request->input('time_finished'),
        ]);
      }
    }

    $jobticket = JobTicket::with('product.details')->where('strJobTicketID', $id)->first();

    return $jobticket;
  }
   public function getStage(Request $request)
  {
    // $stageid= Input::get('stage_id');
    // $substage= SubStage::where('stage_id', '=' ,$stageid)->get();

    // $stagedetail = StageDetail::with('details1')->where('strStageID', '=' ,$request->input('stage_id'))->get();
    // foreach($stagedetail as $sd){
    //   array('substage' => SubStage::where('strSubStageID', '=', $sd)->get());
      // $substage = SubStage::where('strSubStageID', '=', $sd)->get();
    // }
    // return $substage;
    $substage = DB::table('tblsubstage')
              ->join('tblstagedetail', 'tblstagedetail.strSubStageID', '=', 'tblsubstage.strSubStageID')
              ->select('tblsubstage.*')
              ->where('tblstagedetail.strStageID', '=', $request->input('stage_id'))
              ->get();

    return \Response::json(['substage'=> $substage]);
  }


   public function getProduct(Request $request){
  //    if( $request->input('product_data') != ''){
  //     foreach ($request->input('product_data') as $stage) {
  //       // StageDetail::insert([
  //       //   'strStageID' => $id,
  //       //   'strSubStageID' => $stage
  //       // ]);
  //       $productGet = DB::table('tblproduct')
  //             ->join('tblproducttype', 'tblproducttype.strProductTypeID', '=', 'tblproduct.strProductTypeID')
  //             ->select('tblproduct.*', 'tblproducttype.*')
  //             ->where('tblproduct.strProductID', '=', $stage)
  //             ->get();
   //
  //       // $get = ['getProd' => $productGet];
  //     }
  //  }
  //  return \Response::json(['getProd' => $productGet]);
  $pd = DB::table('tblproduct')
    ->join('tblproducttype', 'tblproducttype.strProductTypeID', '=', 'tblproduct.strProductTypeID')
    ->select('tblproduct.strProductID', 'tblproduct.strProductName', 'tblproducttype.strProductTypeName')
    ->where('tblproduct.strProductID', '=', $request->input('prodct_data'))
    ->get();

  return Response::json($pd);
  }
}
