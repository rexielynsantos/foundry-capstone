<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductVarianceRequest;
use App\Http\Controllers\Controller;
use DB;
use Response;

class ProductVarianceController extends Controller
{
  public function viewProductVariance()
  {
    $product = DB::table('tblproductvariance')
                ->where('tblproductvariance.strStatus', '=' , 'Active')
                ->get();

    $material = DB::table('tblmaterial')
                  ->where('strStatus','Active')
                  ->get();

    $varmat = DB::table('tblvariancematerial')
                  ->get();

      return view('Production.productVariance')
      ->with('productVariance',$product)
      ->with('matvar',$varmat)
      ->with('material', $material);
  }

  public function getAllMaterial(){
    $material = DB::table('tblmaterial')
                  ->where('strStatus','Active')
                  ->get();

    return response()->json($material);
  }

  public function addProductVariance(ProductVarianceRequest $request)
  {
    $id = str_random(10);

    DB::table('tblproductvariance')->insert([
      'strProductVarianceID' => $id,
      'strProductVarianceName' => $request->input('variance_name'),
      'strProductVarianceDesc' => $request->input('variance_desc'),
      'strStatus' => 'Active'
    ]);

    if( $request->input('material_data') != ''){
      foreach ($request->input('material_data') as $variance) {
        DB::table('tblvariancematerial')->insert([
          'strProductVarianceID' => $id,
          'strMaterialID' => $variance[0],
          'strVarianceMaterialQty' => $variance[2]
        ]);
      }
    }

    $variance = DB::table('tblproductvariance')
                ->where('tblproductvariance.strProductVarianceID', '=' , $id)
                ->first();
    return response()->json($variance);
  }


  public function editProductVariance(Request $request){
    $variance = DB::table('tblproductvariance')
                ->where('strProductVarianceID',$request->variance_id)
                ->first();

    $material = DB::table('tblvariancematerial')
                ->leftjoin('tblmaterial','tblmaterial.strMaterialID','=','tblvariancematerial.strMaterialID')
                ->select('tblmaterial.*','tblvariancematerial.strVarianceMaterialQty')
                ->where('strProductVarianceID',$request->variance_id)
                ->get();
    return response()->json(['variance' => $variance, 'material' => $material]);
  }

  public function updateProductVariance(ProductVarianceRequest $request){

    DB::table('tblproductvariance')
    ->where('strProductVarianceID',$request->variance_id)
    ->update([
      'strProductVarianceName' => $request->variance_name,
      'strProductVarianceDesc' => $request->variance_desc,
      'strStatus' => 'Active'
    ]);

    DB::table('tblvariancematerial')
          ->where('strProductVarianceID',$request->variance_id)
          ->delete();

    if( $request->input('material_data') != ''){
        foreach ($request->input('material_data') as $variance) {
          DB::table('tblvariancematerial')->insert([
            'strProductVarianceID' => $request->variance_id,
            'strMaterialID' => $variance[0],
            'strVarianceMaterialQty' => $variance[2]
          ]);
        }
    }

    $variance = DB::table('tblproductvariance')
                ->where('tblproductvariance.strProductVarianceID',$request->variance_id)
                ->first();
    return response()->json($variance);
  }


  public function deleteProductVariance(Request $request)
  {
    foreach ($request->input('variance_id') as $varianceID) {
      DB::table('tblproductvariance')
      ->where('tblproductvariance.strProductVarianceID', '=', $varianceID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }
  public function reactivateProductVariance()
  {
    $product = DB::table('tblproductvariance')
                ->where('tblproductvariance.strStatus', '=' , 'Inactive')
                ->get();

    $material = DB::table('tblmaterial')
                  ->where('strStatus','Inactive')
                  ->get();

    $varmat = DB::table('tblvariancematerial')
                  ->get();

      return view('Reactivation.productVarianceReactivation')
      ->with('productVariance',$product)
      ->with('matvar',$varmat)
      ->with('material', $material);
  }
  public function activateProductVariance(Request $request)
  {
    foreach ($request->input('variance_id') as $varianceID) {
      DB::table('tblproductvariance')
      ->where('tblproductvariance.strProductVarianceID', '=', $varianceID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }

}
