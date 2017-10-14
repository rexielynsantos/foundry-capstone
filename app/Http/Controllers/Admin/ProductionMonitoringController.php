<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;
use App\Models\ProductionAllocation;
use App\Models\ProductionAllocationDetail;
// use App\Models\QuoteJobOrder;
use App\Models\Stage;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\JobTicket;
use App\Models\JobTicketDetail;
use App\Models\QuoteProductVariant;

class ProductionMonitoringController extends Controller
{
    public function viewMonitoring(){
    	
    	// $stage = Stage::with('substage.details1')->where('strStatus', 'Active')->get();
    	// // $joborder = QuoteJobOrder::with('product.details4')->get();
	    // $product = Product::where('strStatus', 'Active')->get();
     //    $jobticket = JobTicket::with(['product.details', 'employee', 'stage', 'substage'])->get();
     //    $detail = JobTicketDetail::with(['details'])->get();
     //    $pt = ProductType::with('stage')->get();


     //    // $monitoring = ProductAllocation::with(['stage.substage.details1', 'joborder.product.details4', 'details.product'])->get();
        
    	// return view('Transaction.prodmonitoringver2')
    	// // ->with('monitoring', $monitoring)
     //    ->with('detail', $detail)
     //    ->with('jobticket', $jobticket)
    	// ->with('stage', $stage)
     //    ->with('pt', $pt)
    	// ->with('product', $product);

        $jobticket = JobTicket::with(['product.details', 'employee', 'stage.substage.details1'])
            ->distinct()->select('strStageID')->get();
        // $query = $jobticket->addSelect('tbljobticket.*')
        // $jobticket = DB::table('tblstage')
        //     ->leftjoin('tbljobticket', 'tbljobticket.strStageID', 'tblstage.strStageID')
        //     ->groupBy('strStageID')
        //     ->get();

        return view('Transaction.prodmonitoringver2')
            ->with('jobticket', $jobticket);
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

   
}
