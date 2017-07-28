<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use App\Models\QuoteProduct;
use App\Models\Product;
use DB;
use Response;

class JobOrderController extends Controller
{
    public function viewJobOrder()
    {
    $joborder = QuoteRequest::with('product.details4')->where('strStatus','Approved')->get();
  
      // return Response::json($product);
      return view('Transaction.joborder')
      ->with('joborder',$joborder);
    }
    public function viewAddJobOrder()
    {

    $joborder = QuoteRequest::with('product.details4')->where('strStatus','Approved')->get();
      // return Response::json($product);
      return view('Transaction.jobOrder-add')
      ->with('joborder',$joborder);
    }
    public function viewJobMonitoring()
    {

    $joborder = QuoteRequest::with('product.details4')->where('strStatus','Approved')->get();
      // return Response::json($product);
      return view('Transaction.jobOrder-monitoring')
      ->with('joborder',$joborder);
    }
}
