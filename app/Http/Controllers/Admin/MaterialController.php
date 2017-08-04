<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use App\Models\MaterialSupplier;
use App\Models\MaterialVariant;
use App\Models\MaterialDetail;
use App\Models\Supplier;
use App\Models\Unit;
use DB;
use Response;
class MaterialController extends Controller
  {
    public function getAllVariant()
    {
      $variant = MaterialVariant::with('unit')->  where('strStatus', 'Active')->get();

      return response()->json($variant);
    }

    public function getAllSupplier(){
    $supli = Supplier::where('strStatus','Active')->get();

    return response()->json($supli);
    }
    public function viewMaterial()
    {
      $material = Material::with(['supplier.details2','materialvariant.details'])->where('strStatus', 'Active')->get();
      $unit = Unit::where('strStatus', 'Active')->get();
      

        // return Response::json($material);
        return view('Purchasing.material')
        ->with('matr',$material)
        ->with('unit', $unit);

    }
    public function getSelectedVariant(Request $request)
    {

      $variant = DB::table('tblmaterialvariant')
              ->join('tblmaterialdetail', 'tblmaterialdetail.strMaterialVariantID', '=', 'tblmaterialvariant.strMaterialVariantID')
              ->select('tblmaterialvariant.*')
              ->where('tblmaterialdetail.strMaterialID', '=', $request->variant_data)
              ->get();


        return Response::json($variant);  

      }
    public function addCart(Request $request)
    {

      // $supp = Supplier::where('strSupplierName',  $request->supplier_data)->get();
      // return response()->json($supp);
      $supp = DB::table('tblsupplier')
       ->where('tblsupplier.strSupplierID', $request->supplier_data)
        ->get();
        return Response::json($supp);

      }
    public function addMaterial(Request $request)
    {
      $id = str_random(10);
      Material::insert([
        'strMaterialID' => $id,
        'strMaterialName' => $request->input('material_name'),
        'intReorderLevel' => $request->input('reorder_level'),
        'intReorderQty' => $request->input('reorder_qty'),
        'strUOMID' => $request->input('uom_id'),
        'strMaterialDesc' => $request->input('material_desc'),
        'strStatus' => 'Active'
        ]);

      if($request->input('supplier_data') != ''){
        foreach($request->input('supplier_data') as $supplier){
          MaterialSupplier::insert([
            'strMaterialID' => $id,
            'strSupplierID' => $supplier,
            'dblMaterialCost' =>$request->input('mat_cost'),
          ]);
        }
      }
      if($request->input('variant_data') != ''){
        foreach($request->input('variant_data') as $variant){
          MaterialDetail::insert([
            'strMaterialID' => $id,
            'strMaterialVariantID' => $variant
          ]);
        }
      }


      $material = Material::with(['supplier.details2','materialvariant.details', 'unit'])->where('strMaterialID', $id)->first();
      return $material;
    }
    public function editMaterial(Request $request)
    {
      $material = Material::with(['supplier.details2','materialvariant.details', 'unit'])->where('strMaterialID', $request->material_id)->first();
      // $supplier = MaterialDetail::where('strMaterialID', $request->material_id)->get();
       // return response()->json(['material' => $material, 'supplier' => $supplier]);
      return $material;
    }

    public function updateMaterial(Request $request)
    {
       Material::where('strMaterialID', $request->material_id)
        ->update([
            'strMaterialID' => $request->material_id,
            'strMaterialName' => $request->input('material_name'),
            'intReorderLevel' => $request->input('reorder_level'),
            'intReorderQty' => $request->input('reorder_qty'),
            'strUOMID' => $request->input('uom_id'),
            'strMaterialDesc' => $request->input('material_desc'),
            'strStatus' => 'Active'
        ]);

      MaterialSupplier::where('strMaterialID', $request->material_id)
        ->delete();
      MaterialDetail::where('strMaterialID', $request->material_id)
      ->delete();

        if($request->input('supplier_data') != ''){
          foreach($request->input('supplier_data') as $supplier){
            MaterialSupplier::insert([
              'strMaterialID' => $request->material_id,
              'strSupplierID' => $supplier
            ]);
          }
        }
          if($request->input('variant_data') != ''){
          foreach($request->input('variant_data') as $variant){
            MaterialDetail::insert([
              'strMaterialID' => $request->material_id,
              'strMaterialVariantID' => $variant
            ]);
          }
        }
    $material = Material::with(['supplier.details2','materialvariant.details', 'unit'])->where('tblmaterial.strMaterialID', $request->material_id)
            ->first();
    return response()->json($material);

  }
    public function deleteMaterial(Request $request)
    {
      foreach ($request->input('material_id') as $materialID) {
       Material::where('tblmaterial.strMaterialID', '=', $materialID)
        ->update([
          'strStatus' => 'Inactive',
        ]);
      }
    }


    public function reactivateMaterial()
    {
      $product = DB::table('tblmaterial')
                  ->where('tblmaterial.strStatus', '=' , 'Inactive')
                  ->get();


        // return Response::json($product);
        return view('Reactivation.materialReactivation')
        ->with('material',$product);
    }

    public function activateMaterial(Request $request)
    {
      foreach ($request->input('material_id') as $materialID) {
        DB::table('tblmaterial')
        ->where('tblmaterial.strMaterialID', '=', $materialID)
        ->update([
          'strStatus' => 'Active',
        ]);
      }
    }

}
