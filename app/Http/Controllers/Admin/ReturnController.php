<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\ReturnDetail;
use App\Models\ReturnHeader;
use DB;
use Response;

class ReturnController extends Controller
{

  public function suppliers()
  {
    $supp = DB::table('tblsupplier')->where('strStatus', 'Active')->get();

    return Response::json($supp);
  }

  public function getValues()
  {
    $return = ReturnHeader::with('returned.details','supplier')->get();

    return Response::json($return);
  }

  public function receive(Request $request)
  {
    $rec = DB::table('tblreceivepurchase')
          ->leftjoin('tblpurchase', 'tblpurchase.strPurchaseID', 'tblreceivepurchase.strPurchaseID')
          ->leftjoin('tblsupplier', 'tblsupplier.strSupplierID', 'tblpurchase.strSupplierID')
          ->where('tblpurchase.strSupplierID', $request->input('supplier_id'))
          ->get();

    // dd($rec);

    return Response::json($rec);
  }

  public function receiveInfos(Request $request)
  {
    $recc = DB::table('tblreceivepurchase')
              ->leftjoin('tblreceivepurchasedetail', 'tblreceivepurchasedetail.strReceivePurchaseID', 'tblreceivepurchase.strReceivePurchaseID')
              ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblreceivepurchasedetail.strMaterialID')
              ->where('tblreceivepurchase.strReceivePurchaseID', $request->input('receive_id'))
              ->get();
    // dd($recc);

    return Response::json($recc);
  }

  public function addReturn(Request $request)
  {
    $id = $request->input('id');
    DB::table('tblreturnheader')
        ->insert([
          'strReturnID' => $id,
          'strSupplierID' => $request->input('supplier_id'),
          'strReceivePurchaseID' => $request->input('receive_id'),
          'dateReturned' => $request->input('return_date'),
          'created_at' => $request->input('created_at')
        ]);

    DB::table('tblreturnmaterial')
        ->insert([
          'strReturnID' => $id,
          'strReceivePurchaseID' => $request->input('receive_id'),
          'created_at' => $request->input('created_at')
        ]);

    // $receive = $request->input('receive_id');
    $returned = $request->input('qty_returned');
    $ct = 0;
    foreach ($request->mat_id as $mat) {
      DB::table('tblreturndetail')
          ->insert([
            'strReturnID' => $id,
            'strMaterialID' => $mat,
            // 'strReceivePurchaseID' => $receive[$ct],
            'quantityReturned' => $returned[$ct],
            'isActive' => 1
          ]);
      $ct = $ct + 1;
    }

  }

   public function getReturnMax(){
    $id = DB::table('tblreturnheader')
          ->select('strReturnID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strReturnID', 'desc')
          ->first();

    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strReturnID;

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
      $somenew = 'RETURN00001';
     }
    return response()->json($somenew);
  }


}
