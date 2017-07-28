<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductVariantRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Models\ProductVariantDetail;
use App\Models\Unit;
use App\Models\ProductType;
use DB;
use Response;

class ProductVariantController extends Controller
{

    public function getAllType(){
      $type = ProductType::where('strStatus', 'Active')->get();

      return response()->json($type);
    }


    public function viewProductVariant(){

      $variant = ProductVariant::with('producttype.details')
      ->where('strStatus', 'Active')->get();

      $unit = Unit::where('strStatus', 'Active')->get();

      return view('Production.productVariant')
      ->with('variant', $variant)
      ->with('unit', $unit);

    }

    public function addProductVariant(Request $request){
      $id = str_random(10);

      ProductVariant::insert([
        'strProductVariantID' => $id,
         'intVariantQty' => $request->input('variant_qty'),
        'strUOMID' => $request->input('variant_uomid'),
        'strProductVariantDesc' => $request->input('variant_desc'),
        'strStatus' => 'Active'
        ]);

      if($request->input('type_data') != ''){
        foreach($request->input('type_data') as $type){
         ProductVariantDetail::insert([
            'strProductVariantID' => $id,
            'strProductTypeID' => $type
          ]);
        }
      }

      $variant = ProductVariant::with(['producttype.details','unit'])->where('strProductVariantID', $id)->first();
      return $variant;

    }

    public function editProductVariant(Request $request)
    {
      // $variant = ProductVariant::with('producttype.details')->where('strProductVariantID', $request->variant_id)->first();
      // return $variant;

      $variant = ProductVariant::where('strProductVariantID', $request->variant_id)
                ->first();
      $type = ProductVariantDetail::where('strProductVariantID', $request->variant_id)
              ->get();
      return response()->json(['variant' => $variant, 'type' => $type]);
    }
    public function updateProductVariant(Request $request)
    {

      ProductVariant::where('strProductVariantID', $request->variant_id)
        ->update([
          'intVariantQty' => $request->variant_qty,
          'strUOMID' => $request->variant_uomid,
          'strProductVariantDesc' => $request->variant_desc,
          'strStatus' => 'Active'
        ]);

    ProductVariantDetail::where('strProductVariantID', $request->variant_id)
        ->delete();

        if($request->input('type_data') != ''){
          foreach($request->input('type_data') as $type){
           ProductVariantDetail::insert([
              'strProductVariantID' => $request->variant_id,
              'strProductTypeID' => $type
            ]);
          }
        }

    $variant = ProductVariant::with(['producttype.details','unit'])->where('strProductVariantID', $request->variant_id)->first();
    return response()->json($variant);
    }

    public function deleteProductVariant(Request $request)
  {
    foreach ($request->input('variant_id') as $productVariantID) {
      DB::table('tblproductvariant')
      ->where('tblproductvariant.strProductVariantID', '=', $productVariantID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }

  public function reactivateProductVariant()
  {
    $product = DB::table('tblproductvariant')
                ->where('tblproductvariant.strStatus', '=' , 'Inactive')
                ->get();
      // return Response::json($product);
      return view('Reactivation.productVariantReactivation')
      ->with('productVariant',$product);
  }
  public function activateProductVariant(Request $request)
  {
    foreach ($request->input('variant_id') as $productVariantID) {
      DB::table('tblproductvariant')
      ->where('tblproductvariant.strProductVariantID', '=', $productVariantIDct)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }

}
