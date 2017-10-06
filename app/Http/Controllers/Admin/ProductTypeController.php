<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductTypeRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Models\ProductTypeDetail;
use App\Models\Stage;
use DB;

class ProductTypeController extends Controller
{

  public function getProductTypeMax(){
    $id = DB::table('tblproducttype')
          ->select('strProductTypeID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strProductTypeID', 'desc')
          ->first();
    
    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strProductTypeID;

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
      $somenew = 'TYPE00001';
     }
    return response()->json($somenew);
  }
  
  public function viewProductType()
  {

    $product_type = ProductType::with('stage.details')->where('strStatus','Active')->get();

    return view('Production.productType')
          ->with('productType', $product_type);

  }

  public function addProductType(ProductTypeRequest $request)
  {
    $id = $request->input('id');

    ProductType::insert([
      'strProductTypeID' => $id,
      'strProductTypeName' => $request->input('ptype_name'),
      'strProductTypeDesc' => $request->input('ptype_desc'),
      'created_at' => $request->input('created_at'),
      'strStatus' => 'Active'
    ]);

    if($request->input('stage_data') != ''){
      foreach($request->input('stage_data') as $type){
        ProductTypeDetail::insert([
          'strProductTypeID' => $id,
          'strStageID' => $type
        ]);
      }
    }

    $type = ProductType::with('stage.details')->where('strProductTypeID', $id)->first();
    return $type;
  }

  public function editProductType(Request $request)
  {

    $type = ProductType::with('stage.details')->where('strProductTypeID', $request->ptype_id)->first();
    return $type;
  }

  public function updateProductType(ProductTypeRequest $request)
  {
    ProductType::where('strProductTypeID', $request->ptype_id)
    ->update([
      'strProductTypeName' => $request->ptype_name,
      'strProductTypeDesc' => $request->ptype_desc,
      'strStatus' => 'Active'
    ]);

    ProductTypeDetail::where('strProductTypeID', $request->ptype_id)->delete();

    if($request->input('stage_data') != ''){
      foreach($request->input('stage_data') as $type){
        ProductTypeDetail::insert([
          'strProductTypeID' => $request->ptype_id,
          'strStageID' => $type
        ]);
      }
    }

    $type = ProductType::with('stage.details')->where('strProductTypeID', $request->ptype_id)->first();
    return $type;
  }


  public function deleteProductType(Request $request)
  {
    foreach ($request->input('ptype_id') as $productTypeID) {
      ProductType::where('tblproducttype.strProductTypeID', $productTypeID)
                ->update([
                  'strStatus' => 'Inactive',
                ]);
    }
  }

  public function getAllStage(){
    $material = Stage::where('strStatus','Active')->get();

    return response()->json($material);
  }

  public function reactivateProductType()
  {
    $product = ProductType::where('strStatus', 'Inactive')->get();

    return view('Reactivation.productTypeReactivation')
    ->with('productType',$product);
  }

  public function activateProductType(Request $request)
  {
    foreach ($request->input('ptype_id') as $productTypeID) {
      ProductType::where('strProductTypeID', '=', $productTypeID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }

  public function statusProductType(Request $request)
  {
    $status = ProductType::where('strProductTypeName', '=', $request->input('ptype_name'))->get();


    return response()->json($status);
  }

  public function activeProductType(Request $request)
  {
      ProductType::where('strProductTypeName', '=', $request->input('ptype_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $type = ProductType::with('stage.details')->where('strProductTypeName', $request->ptype_name)->first();
      return $type;

  }
}
