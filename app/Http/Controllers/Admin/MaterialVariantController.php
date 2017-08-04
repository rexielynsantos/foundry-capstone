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
    public function viewMaterialVariant()
    {

      $variant = MaterialVariant::where('strStatus', 'Active')->get();

      $unit = Unit::where('strStatus', 'Active')->get();

      return view('Production.materialvariant')
      ->with('variant', $variant)
      ->with('unit', $unit);
    }
    public function addMaterialVariant(Request $request){
      $id = str_random(10);

      MaterialVariant::insert([
        'strMaterialVariantID' => $id,
         'intVariantQty' => $request->input('variant_qty'),
        'strUOMID' => $request->input('variant_uomid'),
        'strMaterialVariantDesc' => $request->input('variant_desc'),
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
