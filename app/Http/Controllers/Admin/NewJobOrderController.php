<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobOrder;
use App\Models\CustPurchase;
use DB;
use Response;

class NewJobOrderController extends Controller
{
	public function getJobOrderMax(){
	    $id = DB::table('tbljoborder')
	          ->select('strJobOrdID')
	          ->orderBy('created_at', 'desc')
	          ->orderBy('strJobOrdID', 'desc')
	          ->first();

	    $new = "";
	     $somenew = "";
	     $arrNew = [];
	     $boolAdd = TRUE;

	     if($id != ''){
	        $idd = $id->strJobOrdID;

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
	      $somenew = 'JO00001';
	     }
	    return response()->json($somenew);
  	}

  	public function viewJobOrder(){
    	// $joborder = JobOrder::with('custpurchase.customer')->get();
    	// dd($joborder);
    	// $joborder = DB::table('tbljoborder')
    	// 	->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustPurchaseID', 'tbljoborder.strCustPurchaseID')
    	// 	->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblcustpurchase.strCustomerID')
    	// 	->select('tbljoborder.*', 'tblcustpurchase.*', 'tblcustomer.strCompanyName')
    	// 	->get();
    	return view('Transaction.joborders');
    	// ->with('joborder', $joborder);
    }

    public function jobOrders(){
    	$joborder = JobOrder::with('custpurchase.customer')->get();
    	return $joborder;
    }

    public function newJobOrder(){
    	$joborder = JobOrder::with('custpurchase')->get();
    	$custpur = CustPurchase::where('strSOStatus', 'On-Process')->get();

    	return view('Transaction.joborder-new')
    	->with('joborder', $joborder)
    	->with('custpur', $custpur);
    }

    public function getRefPO(Request $request){
    	$po = CustPurchase::with(['customer', 'quotation.quoteprodvariant.details4'])
    		->where('tblcustpurchase.strCustPurchaseID', $request->input('refpo'))
    		->first();


    	return $po;
    }

    public function pdfJobOrder(Request $request){
    	$po = JobOrder::with(['custpurchase.customer.contact', 'custpurchase.quotation.quoteprodvariant.details4'])
    		->where('tbljoborder.strJobOrdID', $request->input('id'))
    		->first();


    	return $po;
    }

    public function addJobOrder(Request $request){
    	JobOrder::insert([
    		'strJobOrdID' => $request->input('id'),
    		'strCustPurchaseID' => $request->input('custpurid'),
    		'boolIsNewProduct' => 1,
    		'boolIsRepeatOrder' => 0,
    		'strJobRemarks' => $request->input('remarks'),
    		'strJobOrdStatus' => "On-Process",
    		'created_at' => $request->input('created_at'),
    	]);
    	DB::table('tblcustpurchase')
    	->where('strCustPurchaseID', $request->input('custpurid'))
    	->update([
         'strSOStatus' => 'Job On-Process'
    ]);
    }
}
