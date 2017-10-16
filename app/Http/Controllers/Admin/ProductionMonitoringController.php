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
    // public function viewMonitoring(){
      
    //  // $stage = Stage::with('substage.details1')->where('strStatus', 'Active')->get();
    //  // // $joborder = QuoteJobOrder::with('product.details4')->get();
     //  // $product = Product::where('strStatus', 'Active')->get();
    //  //    $jobticket = JobTicket::with(['product.details', 'employee', 'stage', 'substage'])->get();
    //  //    $detail = JobTicketDetail::with(['details'])->get();
    //  //    $pt = ProductType::with('stage')->get();


    //  //    // $monitoring = ProductAllocation::with(['stage.substage.details1', 'joborder.product.details4', 'details.product'])->get();
        
    //  // return view('Transaction.prodmonitoringver2')
    //  // // ->with('monitoring', $monitoring)
    //  //    ->with('detail', $detail)
    //  //    ->with('jobticket', $jobticket)
    //  // ->with('stage', $stage)
    //  //    ->with('pt', $pt)
    //  // ->with('product', $product);

    //     $jobticket = JobTicket::with(['product.details', 'employee', 'stage.substage.details1'])
    //         ->distinct()->select('strStageID')->get();
    //     // $query = $jobticket->addSelect('tbljobticket.*')
    //     // $jobticket = DB::table('tblstage')
    //     //     ->leftjoin('tbljobticket', 'tbljobticket.strStageID', 'tblstage.strStageID')
    //     //     ->groupBy('strStageID')
    //     //     ->get();

    //     return view('Transaction.prodmonitoringver2')
    //         ->with('jobticket', $jobticket);

      // $x = DB::table('tbljobticket')
      //     ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
      //     ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tbljobticketdetail.strProductID')
      //     ->distinct()
      //     ->select('tbljobticketdetail.strProductID')
      //     ->where('tbljobticket.strStageID', $request->input('stage_id'));
      // $y = $x->addSelect("tblproduct.strProductName")->get();
      // return $y;

    // }

    public function monitoringtbl(Request $request){
      $x = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tbljobticketdetail.strProductID')
          ->distinct()
          ->select('tbljobticketdetail.strProductID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'));
      $y = $x->addSelect("tblproduct.strProductName")->get();

      // $arr = [];
      // $ctr = 0;
      // foreach($->strProductID as $id){
      //   $sub = DB::table('tbljobticket')
      //     ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
      //     ->where('tbljobticket.strSubStageID', 'SUBST00002')
      //     ->where('tbljobticket.strProductID', $id)
      //     ->count();
      //   $arr[$ctr] = $sub;
      //   $ctr = $ctr + 1;
      // }

      // return Response::json(array('product'=>$x, 'sub'=>$arr));
      return $y;

    }

    public function monitoringtbl1(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00007')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      // $y = $x->addSelect("tblproduct.strProductName")->get();
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00005')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $d = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      $z[3] = $c;
      if($d == null){
        $z[4] = "";
      }
      else{
        $z[4] = $d->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl2(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00001')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00002')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00003')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $d = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $e = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      $z[3] = $c;
      $z[4] = $d;
      if($e == null){
        $z[5] = "";
      }
      else{
        $z[5] = $e->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl3(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00007')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00008')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00009')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $d = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00010')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $e = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00012')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $f = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00013')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $g = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00014')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $h = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00015')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $i = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00016')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $j = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $k = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      $z[3] = $c;
      $z[4] = $d;
      $z[5] = $e;
      $z[6] = $f;
      $z[7] = $g;
      $z[8] = $h;
      $z[9] = $i;
      $z[10] = $j;
      if($k == null){
        $z[11] = "";
      }
      else{
        $z[11] = $k->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl4(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->where('tbljobticket.strSubStageID', '=', NULL)
          ->sum('tbljobticketdetail.dblJobFinished'); 
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      if($c == null){
        $z[3] = "";
      }
      else{
        $z[3] = $c->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl5(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->where('tbljobticket.strSubStageID', '=', NULL)
          ->sum('tbljobticketdetail.dblJobFinished'); 
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      if($c == null){
        $z[3] = "";
      }
      else{
        $z[3] = $c->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl6(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->where('tbljobticket.strSubStageID', '=', NULL)
          ->sum('tbljobticketdetail.dblJobFinished'); 
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      if($c == null){
        $z[3] = "";
      }
      else{
        $z[3] = $c->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl7(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->where('tbljobticket.strSubStageID', '=', NULL)
          ->sum('tbljobticketdetail.dblJobFinished'); 
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      if($c == null){
        $z[3] = "";
      }
      else{
        $z[3] = $c->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl8(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->where('tbljobticket.strSubStageID', '=', NULL)
          ->sum('tbljobticketdetail.dblJobFinished'); 
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      if($c == null){
        $z[3] = "";
      }
      else{
        $z[3] = $c->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl9(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->where('tbljobticket.strSubStageID', '=', NULL)
          ->sum('tbljobticketdetail.dblJobFinished'); 
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      if($c == null){
        $z[3] = "";
      }
      else{
        $z[3] = $c->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl10(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->where('tbljobticket.strSubStageID', '=', NULL)
          ->sum('tbljobticketdetail.dblJobFinished'); 
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      if($c == null){
        $z[3] = "";
      }
      else{
        $z[3] = $c->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl11(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->where('tbljobticket.strSubStageID', '=', NULL)
          ->sum('tbljobticketdetail.dblJobFinished'); 
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      if($c == null){
        $z[3] = "";
      }
      else{
        $z[3] = $c->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl12(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->where('tbljobticket.strSubStageID', '=', NULL)
          ->sum('tbljobticketdetail.dblJobFinished'); 
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      if($c == null){
        $z[3] = "";
      }
      else{
        $z[3] = $c->intOrderQty;
      }
      return $z;
    }
    public function monitoringtbl13(Request $request){
      $a = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->where('tbljobticket.strSubStageID', '=', NULL)
          ->sum('tbljobticketdetail.dblJobFinished'); 
      $b = DB::table('tbljobticket')
          ->leftjoin('tbljobticketdetail', 'tbljobticketdetail.strJobTicketID', 'tbljobticket.strJobTicketID')
          ->where('tbljobticket.strStageID', $request->input('stage_id'))
          ->where('tbljobticket.strSubStageID', 'SUBST00017')
          ->where('tbljobticketdetail.strProductID', $request->input('prod_id'))
          ->sum('tbljobticketdetail.dblJobFinished');
      $c = DB::table('tbljobticket')
          ->leftjoin('tbljoborder', 'tbljoborder.strJobOrdID', 'tbljobticket.strJobOrdID')
          ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
          ->leftjoin('tblquotation', 'tblquotation.strQuoteID', 'tblcustpurchase.strQuoteID')
          ->leftjoin('tblquoteproductvariant', 'tblquoteproductvariant.strQuoteID', 'tblquotation.strQuoteID')
          ->where('tblquoteproductvariant.strProductID', '=', $request->input('prod_id'))
          ->select('tblquoteproductvariant.intOrderQty')
          ->first();
      $z[0] = $request->input('prod_name');
      $z[1] = $a;
      $z[2] = $b;
      if($c == null){
        $z[3] = "";
      }
      else{
        $z[3] = $c->intOrderQty;
      }
      return $z;
    }
   
}
