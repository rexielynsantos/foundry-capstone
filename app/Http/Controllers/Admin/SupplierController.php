<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use DB;
use Response;

class SupplierController extends Controller
{

  public function getSupplierMax(){
    $id = DB::table('tblsupplier')
          ->select('strSupplierID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strSupplierID', 'desc')
          ->first();
    
    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strSupplierID;

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
      $somenew = 'SUP00001';
     }
    return response()->json($somenew);
  }

  public function viewSupplier()
  {
    $product = Supplier::where('strStatus','Active')->get();

      // return Response::json($product);
      return view('Purchasing.supplier')
      ->with('supp',$product);
  }

	 public function addSupplier(Request $request)
	  {
      $id = $request->input('id');
      Supplier::insert([
        'strSupplierID' => $id,
        'strSupplierName' => $request->supplier_name,
        'strSupStreet' => $request->supplier_street,
        'strSupBrgy' => $request->supplier_brgy,
        'strSupCity' => $request->supplier_city,
        'strSupplierDesc' => $request->supplier_desc,
        'strStatus' => 'Active',
        'created_at' => $request->input('created_at'),
      ]);
    $supplier =Supplier::where('strSupplierID',$id)->first();
    return $supplier;

  }
  public function editSupplier(Request $request)
  {
    $product = DB::table('tblsupplier')
                ->where('tblsupplier.strSupplierID', '=' , $request->input('supplier_id'))
                ->get();
    return Response::json($product);
  }
   public function updateSupplier(Request $request)
  {
    Supplier::where('strSupplierID', $request->supplier_id)->update([
       'strSupplierName' => $request->supplier_name,
        'strSupStreet' => $request->supplier_street,
        'strSupBrgy' => $request->supplier_brgy,
        'strSupCity' => $request->supplier_city,
        'strSupplierDesc' => $request->supplier_desc,
      ]);
    $supplier = Supplier::where('strSupplierID', $request->supplier_id)->first();
    return $supplier;

  }
   public function deleteSupplier(Request $request)
  {
    foreach ($request->input('supplier_id') as $supplierID) {
      DB::table('tblsupplier')
      ->where('tblsupplier.strSupplierID', '=', $supplierID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }
  public function reactivateSupplier()
  {
    $supplier = DB::table('tblsupplier')
                ->where('tblsupplier.strStatus', '=' , 'Inactive')
                ->get();
      // return Response::json($product);
      return view('Purchasing.supplierReactivation')
      ->with('supplier',$supplier);
  }
  public function activateSupplier(Request $request)
  {
    foreach ($request->input('supplier_id') as $supplierID) {
      DB::table('tblsupplier')
      ->where('tblsupplier.strSupplierID', '=', $supplierID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }
  public function statusSupplier(Request $request)
  {
    $status = Supplier::where('strSupplierName', '=', $request->input('supplier_name'))->get();


    return response()->json($status);
  }

  public function activeSupplier(Request $request)
  {
      Supplier::where('strSupplierName', '=', $request->input('supplier_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $supplier = Supplier::where('strSupplierName', $request->supplier_name)->first();
      return $supplier;

  }


}
