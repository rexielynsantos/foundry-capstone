<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustContact;
use App\Models\Costing;
use App\Models\CostingMaterial;
use App\Models\Product;
use App\Mail\QuotationMail;
use DB;
use Response;
use Session;
class CustomerController extends Controller
{
  public function getCostingMax(){
    $id = DB::table('tblcosting')
          ->select('strCostingID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strCostingID', 'desc')
          ->first();

    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strCostingID;

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
      $somenew = 'PC00001';
     }
    return response()->json($somenew);
  }

  public function getCustomerMax(){
    $id = DB::table('tblcustomer')
          ->select('strCustomerID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strCustomerID', 'desc')
          ->first();

    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strCustomerID;

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
      $somenew = 'CUST00001';
     }
    return response()->json($somenew);
  }

  public function getQuotationMax(){
    $id = DB::table('tblquotation')
          ->select('strQuoteID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strQuoteID', 'desc')
          ->first();

    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strQuoteID;

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
      $somenew = 'QR-00001';
     }
    return response()->json($somenew);
  }
  public function customerView()
  {
    Session::forget('editstrCustomerID');
    Session::forget('editstrCompanyName');
    Session::forget('editstrCustStreet');
    Session::forget('editstrCustBrgy');
    Session::forget('editstrCustCity');
    Session::forget('editstrCustTelNo');
    Session::forget('editstrCustEmail');
    $customers = DB::table('tblcustomer')
    ->where('strStatus','Active')
    ->get();

    return view('Transaction.customer');
  }

  public function viewCustomer()
  {
    $customers = DB::table('tblcustomer')
    ->where('strStatus','Active')
    ->get();

    return Response::json($customers);
  }
  public function viewCustomerr()
  {
    // $customers = DB::table('tblcustomer')
    // ->where('strStatus','Active')
    // ->get();

    $customers = Customer::with('contact')->where('strStatus', 'Active')->get();
    return view('Transaction.customer-list')
          ->with('customers',$customers);
  }

  public function viewCustomerrr()
  {
    $customers = DB::table('tblcustomer')
    ->where('strStatus','Active')
    ->get();

    return view('Transaction.estimate-add')
          ->with('cust',$customers);
  }

  public function newQuote(Request $request)
  {
    // dd($request->all());
    // $customers = DB::table('tblcosting')
    // ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblcosting.strCustomerID')
    // ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblcosting.strProductID')
    // ->leftjoin('tblcostingmaterial', 'tblcostingmaterial.strCostingID', 'tblcosting.strCostingID')
    // ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblcostingmaterial.strMaterialID')
    // ->where('tblcosting.strCustomerID', $request->cust_id)
    // ->where('tblcosting.strCostingStatus', 'Approved')
    // ->select('tblcosting.*', 'tblcustomer.*', 'tblcostingmaterial.*', 'tblmaterial.*', 'tblproduct.*')
    // ->get();

    $customers = Costing::with(['costingmaterial.details', 'product', 'customer'])
          ->where('tblcosting.strCustomerID', $request->input('cust_id'))
          ->where('tblcosting.strCostingStatus', 'Approved')
          ->first();

   
    // dd($customers);
    return Response::json($customers);
  }

  public function addQuote(Request $request)
  {
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // $customer = DB::table('tblcustomer')
    //     ->where('tblcustomer.strCustomerID', '=', $request->input('cust_id'))
    //     ->select('tblcustomer.strCustEmail')
    //     ->get();

    // $customer = Customer::create(
    //   request([$cust])
    // );

    // $customer = 'afablepolene@gmail.com';


    // \Mail::to($customer)->send(new QuotationMail($customer));
    // dd($request->all());

    $id = $request->input('id');

    DB::table('tblquotation')
      ->insert([
        'strQuoteID' => $id,
        'strCustomerID' => $request->input('cust_id'),
        'strTermID' => $request->input('term_id'),
        'strCostingID' => $request->input('costing_id'),
        'strQuoteStatus' => 'For Approval',
        'strQuoteDescription' => $request->input('quote_desc'),
        'created_at' => $request->input('created_at')
      ]);


  }

  public function viewProfile(Request $request)
  {
    // dd($request->all())

    $viewProfile = DB::table('tblcustomer')
            ->leftjoin('tblcustpurchase', 'tblcustpurchase.strCustomerID', 'tblcustomer.strCustomerID')
            ->where('tblcustomer.strCustomerID', $request->cust_id)
            ->orderBy('tblcustpurchase.dtOrderDate', 'desc')
            ->first();

    $counter = DB::table('tblcustpurchase')
            ->where('strCustomerID', $request->cust_id)
            ->count();
    // dd($counter);
    Session::put('strCustomerID',$viewProfile->strCustomerID);
    Session::put('strCompanyName',$viewProfile->strCompanyName);
    Session::put('strCustStreet',$viewProfile->strCustStreet);
    Session::put('strCustBrgy',$viewProfile->strCustBrgy);
    Session::put('strCustCity',$viewProfile->strCustCity);
    Session::put('strCustTelNo',$viewProfile->strCustTelNo);
    Session::put('strCustEmail',$viewProfile->strCustEmail);
    Session::put('dtOrderDate',$viewProfile->dtOrderDate);
    Session::put('transactionsMade', $counter);
  }

  public function viewCustomerContacts(Request $request)
  {
    $viewProfileContact = DB::table('tblcustcontact')
            ->where('strCustomerID', $request->cust_id)
            ->get();

    return Response::json($viewProfileContact);
  }

  public function orderHistory(Request $request)
  {
    $custpurchase = DB::table('tblcustpurchase')
            ->where('strCustomerID', $request->cust_id)
            ->get();

    return Response::json($custpurchase);
  }
  public function currentJob(Request $request)
  {

    $job = DB::table('tblcustpurchase')
            ->leftjoin('tbljoborder', 'tbljoborder.strCustPurchaseID', 'tblcustpurchase.strCustPurchaseID')

            ->where('strJobOrdStatus', 'On-Process')
            ->where('strCustomerID', $request->cust_id)
            ->get();

    return Response::json($job);
  }

  public function editCustomer(Request $request)
  {
    $viewProfile = DB::table('tblcustomer')
            ->where('strCustomerID', $request->cust_id)
            ->first();
    // dd($custContact);
    Session::put('editstrCustomerID',$viewProfile->strCustomerID);
    Session::put('editstrCompanyName',$viewProfile->strCompanyName);
    Session::put('editstrCustStreet',$viewProfile->strCustStreet);
    Session::put('editstrCustBrgy',$viewProfile->strCustBrgy);
    Session::put('editstrCustCity',$viewProfile->strCustCity);
    Session::put('editstrCustTelNo',$viewProfile->strCustTelNo);
    Session::put('editstrCustEmail',$viewProfile->strCustEmail);
  }

  public function updateCustomer(Request $request)
  {
    $id = $request->input('tempID');
    DB::table('tblcustomer')
    ->update([
      'strCustomerID' => $id,
      'strCompanyName' => $request->input('cust_name'),
      'strCustStreet' => $request->input('cust_street'),
      'strCustBrgy' => $request->input('cust_brgy'),
      'strCustCity' => $request->input('cust_city'),
      'strCustTelNo' => $request->input('custTelNo'),
      'strCustEmail' => $request->input('cust_email'),
      'strStatus' => 'Active'
    ]);

    DB::table('tblcustcontact')->where('strCustomerID', $id)->delete();

    $contactNum = $request->input('cust_contactNum');
    $ctr = 0;
    if($request->input('cust_contact') != ''){
      foreach($request->input('cust_contact') as $custContact){
        DB::table('tblcustcontact')
        ->insert([
          'strCustomerID' => $id,
          'strContactPersonName' => $custContact,
          'strContactNo' => $contactNum[$ctr]
        ]);
        $ctr = $ctr + 1;
      }
    }
    return Response::json($id);
  }

  public function viewCustomerProduct()
  {
    $products = DB::table('tblproduct')
    ->where('strStatus','Active')
    ->get();

    return Response::json($products);
  }

  public function viewCustomerVariance(Request $request)
  {
    $variance = DB::table('tblmatspec')
    ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblmatspec.strProductID')
    ->where('tblmatspec.strStatus','Active')
    ->where('tblmatspec.strProductID', $request->product_id)
    ->get();

    return Response::json($variance);
  }

  public function varianceInfo(Request $request)
  {
    // dd($request->all());
    $varianceInfo = DB::table('tblmatspec')
        ->leftjoin('tblmatspecdetail', 'tblmatspecdetail.strMatSpecID' , 'tblmatspec.strMatSpecID')
        ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblmatspecdetail.strMaterialID')
        ->where('tblmatspec.strMatSpecID', $request->variance_code)
        ->get();

    return Response::json($varianceInfo);
  }

  public function uomInfo()
  {
    $uom = DB::table('tbluom')
    ->where('strStatus','Active')
    ->get();

    return Response::json($uom);
  }

  public function addCustomer(Request $request)
  {
    // dd($request->all());
      $temp = $request->input('tempID');
      $id = $request->input('id');
      DB::table('tblcustomer')
      ->insert([
        'strCustomerID' => $id,
        'strCompanyName' => $request->input('cust_name'),
        'strCustStreet' => $request->input('cust_street'),
        'strCustBrgy' => $request->input('cust_brgy'),
        'strCustCity' => $request->input('cust_city'),
        'strCustTelNo' => $request->input('custTelNo'),
        'strCustEmail' => $request->input('cust_email'),
        'strStatus' => 'Active',
        'created_at' => $request->input('created_at')
      ]);

      $contactNum = $request->input('cust_contactNum');
      $ctr = 0;
      if($request->input('cust_contact') != ''){
        foreach($request->input('cust_contact') as $custContact){
          DB::table('tblcustcontact')
          ->insert([
            'strCustomerID' => $id,
            'strContactPersonName' => $custContact,
            'strContactNo' => $contactNum[$ctr]
          ]);
          $ctr = $ctr + 1;
        }
      }

      return Response::json($id);
    }

  public function viewCosting()
  {
    $viewCost = DB::table('tblcosting')
        ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblcosting.strCustomerID')
        ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblcosting.strProductID')
        ->where('strCostingStatus', 'For Approval')
        ->get();

    $approvedViewCost = DB::table('tblcosting')
        ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblcosting.strCustomerID')
        ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblcosting.strProductID')
        ->where('strCostingStatus', 'Approved')
        ->get();

    return view('Transaction.product-costing-list')
      ->with('viewCost', $viewCost)
      ->with('approvedViewCost', $approvedViewCost);
    // return Response::json($viewCost)
  }

  public function approveCosting(Request $request)
  {
    $id = $request->input('costing_id');
    DB::table('tblcosting')
    ->where('strCostingID', $id)
    ->update([
      'strCostingStatus' => 'Approved'
    ]);
  }

  public function disapproveCosting(Request $request)
  {
    $id = $request->input('costing_id');
    DB::table('tblcosting')
    ->where('strCostingID', $id)
    ->update([
      'strCostingStatus' => 'Disapproved'
    ]);
  }

  public function viewSummary(Request $request)
  {
    $id = $request->input('costing_id');
    $costing = DB::table('tblcosting')
              ->where('strCostingID', $id)
              ->first();

    Session::put('costingID', $costing->strCostingID);
  }

  public function viewCostingSummary(Request $request)
  {
    $id = $request->input('costing_id');

    $costing = DB::table('tblcosting')
              ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblcosting.strCustomerID')
              ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblcosting.strProductID')
              ->where('tblcosting.strCostingID', $id)
              ->first();

    return Response::json($costing);
  }

  public function viewMaterialCosting(Request $request)
  {
    $id = $request->input('costing_id');
    $costing = DB::table('tblcostingmaterial')
              ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblcostingmaterial.strMaterialID')
              ->where('strCostingID', $id)
              ->get();

    return Response::json($costing);
  }

  public function addCosting(Request $request)
  {
    // dd($request->all());
    $id = $request->input('id');
    DB::table('tblcosting')
    ->insert([
      'strCostingID' => $id,
      'strCustomerID' => $request->input('customer_id'),
      'strProductID' => $request->input('product_id'),
      'strMatSpecID'=> $request->input('matspec_id'),
      'dblSpecificGravity' => $request->input('spGravity'),
      'dblSurfaceArea' => $request->input('surfaceArea'),
      'dblMainVolume' => $request->input('volume'),
      'dblWeightNonFilled' => $request->input('weightNon'),
      'dblWeightFilled' => $request->input('weightFilled'),
      'dblWeightSoluble' => $request->input('soluble'),
      'dblWeightReclaimed' => $request->input('reclaimed'),
      'dblWeightAsMetal' => $request->input('asMetal'),
      'dblRunnerType' => $request->input('runnerType'),
      'dblArea' => $request->input('area'),
      'dblSideVolume' => $request->input('svolume'),
      'dblWeight' => $request->input('weight'),
      'dblSprueType' => $request->input('sprue'),
      'dblClusterArea' => $request->input('cluster'),
      'dblClusterWeightAsWax' => $request->input('wax'),
      'dblClusterWeightAsMetal' => $request->input('asMetal'),
      'intPcsPerCluster' => $request->input('pcsPerCluster'),
      'dblEfficiencyAtInjection' => $request->input('atInjection'),
      'dblEfficiencyAtAssembly' => $request->input('atAssembly'),
      'dblEfficiencyAtCoating' => $request->input('atCoating'),
      'dblEfficiencyAtCasting' => $request->input('atCasting'),
      'strCostingStatus' => 'For Approval',
      'created_at' => $request->input('created_at'),
    ]);

    $unit_cost = $request->input('unit_cost');
    $usage = $request->input('usage');
    $cost = $request->input('cost');
    $uom = $request->input('uom');
    $ctr = 0;

    if($request->input('matspec') != ''){
      foreach($request->input('matspec') as $mtspc){
        DB::table('tblcostingmaterial')
        ->insert([
          'strCostingID' => $id,
          'strMaterialID' => $mtspc,
          'strUOMID' => $uom[$ctr],
          'dblMatCost' => $unit_cost[$ctr],
          'dblUsage' => $usage[$ctr],
          'dblFinalCost' => $cost[$ctr],
        ]);
        $ctr = $ctr + 1;
      }
    }



  }

  public function pdfCosting(Request $request){
     $approvedViewCost = DB::table('tblcosting')
        ->leftjoin('tblcustomer', 'tblcustomer.strCustomerID', 'tblcosting.strCustomerID')
        ->leftjoin('tblproduct', 'tblproduct.strProductID', 'tblcosting.strProductID')
        ->leftjoin('tblcostingmaterial', 'tblcostingmaterial.strCostingID', 'tblcosting.strCostingID')
        ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblcostingmaterial.strMaterialID')
        ->leftjoin('tbluom', 'tbluom.strUOMID', 'tblcostingmaterial.strUOMID')
        ->where('strCostingStatus', 'Approved')
        ->get();

      return $approvedViewCost;
  }

}
