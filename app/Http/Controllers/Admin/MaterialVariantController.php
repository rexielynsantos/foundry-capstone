<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MaterialVariant;
use App\Models\Unit;
use App\Models\ProductType;
use DB;
use Response;

class MaterialVariantController extends Controller
{

    public function getMaterialVariantMax(){
    $id = DB::table('tblmaterialvariant')
          ->select('strMaterialVariantID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strMaterialVariantID', 'desc')
          ->first();
    
    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strMaterialVariantID;

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
      $somenew = 'MVAR00001';
     }
    return response()->json($somenew);
  }

    public function viewMaterialVariant()
    {

      $variant = MaterialVariant::where('strStatus', 'Active')->get();

      $unit = Unit::where('strStatus', 'Active')->get();

      return view('Production.materialvariant')
      ->with('variant', $variant)
      ->with('unit', $unit);
    }
    public function addMaterialVariant(Request $request){
      $id = $request->input('id');

      MaterialVariant::insert([
        'strMaterialVariantID' => $id,
         'intVariantQty' => $request->input('variant_qty'),
        'strUOMID' => $request->input('variant_uomid'),
        'strMaterialVariantDesc' => $request->input('variant_desc'),
        'created_at' => $request->input('created_at'),
        'strStatus' => 'Active'
        ]);


      $variant = MaterialVariant::with(['unit'])->where('strMaterialVariantID', $id)->first();
      return $variant;

    }
    public function editMaterialVariant(Request $request)
    {

      $variant = MaterialVariant::where('strMaterialVariantID', $request->variant_id)
                ->first();
     
      return response()->json(['variant' => $variant]);
    }
    public function updateMaterialVariant(Request $request)
    {

      MaterialVariant::where('strMaterialVariantID', $request->variant_id)
        ->update([
          'intVariantQty' => $request->variant_qty,
          'strUOMID' => $request->variant_uomid,
          'strMaterialVariantDesc' => $request->variant_desc,
          'strStatus' => 'Active'
        ]);

    $variant = MaterialVariant::with(['unit'])->where('strMaterialVariantID', $request->variant_id)->first();
    return response()->json($variant);
    }

    public function deleteMaterialVariant(Request $request)
  {
    foreach ($request->input('variant_id') as $materialVariantID) {
      DB::table('tblmaterialvariant')
      ->where('tblmaterialvariant.strMaterialVariantID', '=', $materialVariantID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }

  // public function statusMaterialVariant(Request $request)
  // {
  //   $status = MaterialVariant::where('strStageName', '=', $request->input('stage_name'))->get();


  //   return response()->json($status);
  // }

  // public function activeMaterialVariant(Request $request)
  // {
  //     MaterialVariant::where('strStageName', '=', $request->input('stage_name'))

  //     ->update([
  //       'strStatus' => 'Active',
  //     ]);

  //     $mv = MaterialVariant::with('substage.details1')->where('strStageName', $request->stage_name)->first();
  //     return $mv;

  // }

  // public function reactivateProductVariant()
  // {
  //   $material = DB::table('tblmaterialvariant')
  //               ->where('tblmaterialvariant.strStatus', '=' , 'Inactive')
  //               ->get();
  //     // return Response::json($product);
  //     return view('Reactivation.materialVariantReactivation')
  //     ->with('materialVariant',$material);
  // }
  // public function activateMaterialVariant(Request $request)
  // {
  //   foreach ($request->input('variant_id') as $materialVariantID) {
  //     DB::table('tblmaterialvariant')
  //     ->where('tblmaterialvariant.strMaterialVariantID', '=', $materialVariantIDct)
  //     ->update([
  //       'strStatus' => 'Active',
  //     ]);
  //   }
  // }


}
