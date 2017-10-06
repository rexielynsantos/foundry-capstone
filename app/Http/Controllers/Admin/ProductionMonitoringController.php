<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;
use App\Models\ProductionAllocation;
use App\Models\ProductionAllocationDetail;
use App\Models\QuoteJobOrder;
use App\Models\Stage;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\JobTicket;
use App\Models\JobTicketDetail;
use App\Models\QuoteProductVariant;

class ProductionMonitoringController extends Controller
{
    public function viewMonitoring(){
    	
    	$stage = Stage::with('substage.details1')->where('strStatus', 'Active')->get();
    	$joborder = QuoteJobOrder::with('product.details4')->get();
	    $product = Product::where('strStatus', 'Active')->get();
        $jobticket = JobTicket::with(['product.details', 'employee', 'stage', 'substage'])->get();
        $detail = JobTicketDetail::with(['details'])->get();
        $pt = ProductType::with('stage')->get();


        // $monitoring = ProductAllocation::with(['stage.substage.details1', 'joborder.product.details4', 'details.product'])->get();
        
    	return view('Transaction.prodmonitoringver2')
    	// ->with('monitoring', $monitoring)
        ->with('detail', $detail)
        ->with('jobticket', $jobticket)
    	->with('stage', $stage)
    	->with('joborder', $joborder)
        ->with('pt', $pt)
    	->with('product', $product);
    }

    public function addMonitoring(Request $request){

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

    public function getJob(Request $request)
    {
      $job = DB::table('tblquotejoborder')
                ->join('tblquoteproductvariant', 'tblquoteproductvariant.strSubStageID', '=', 'tblquotejoborder.strSubStageID')
                ->select('tblquoteproductvariant.*')
                ->where('tblquoteproductvariant.strJobOrderID', '=', $request->input('job_id'))
                ->get();

      return Response::json(['job'=> $job]);
    }
}
