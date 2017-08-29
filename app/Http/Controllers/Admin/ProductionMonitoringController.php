<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;
use App\Models\ProductionMonitoring;

class ProductionMonitoringController extends Controller
{
    public function viewMonitoring(){
    	$monitoring = ProductionMonitoring::with(['stage.substage.details1', 'joborder.product.details4'])->get();
    	$stage = Stage::with('substage.details1')->where('strStatus', 'Active')->get();
    	$joborder = QuoteJobOrder::
	    $product = Product::where('strStatus', 'Active')->get();
    	return view('Transaction.production-monitoring')
    	->with('monitoring', $monitoring)
    	->with('stage', $stage)
    	->with('joborder', $joborder)
    	->with('product', $product);
    }

    public function addMonitoring(Request $request){

    }
}
