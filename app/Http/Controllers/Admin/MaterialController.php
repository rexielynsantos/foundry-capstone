<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use App\Models\MaterialDetail;
use App\Models\Supplier;
use App\Models\Unit;
use DB;
use Response;
class MaterialController extends Controller
  {

    public function getAllSupplier(){
    $supli = Supplier::where('strStatus','Active')->get();

    return response()->json($supli);
    }
    public function viewMaterial()
    {
      $material = Material::with('supplier.details2')->where('strStatus', 'Active')->get();
      $unit = Unit::where('strStatus', 'Active')->get();

        // return Response::json($material);
        return view('Purchasing.material')
        ->with('matr',$material)
        ->with('unit', $unit);

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
          MaterialDetail::insert([
            'strMaterialID' => $id,
            'strSupplierID' => $supplier
          ]);
        }
      }
      $material = Material::with(['supplier.details2', 'unit'])->where('strMaterialID', $id)->first();
      return $material;
    }
    public function editMaterial(Request $request)
    {
      $material = Material::with(['supplier.details2', 'unit'])->where('strMaterialID', $request->material_id)->first();
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

      MaterialDetail::where('strMaterialID', $request->material_id)
        ->delete();

        if($request->input('supplier_data') != ''){
          foreach($request->input('supplier_data') as $supplier){
            MaterialDetail::insert([
              'strMaterialID' => $request->material_id,
              'strSupplierID' => $supplier
            ]);
          }
        }
    $material = Material::with(['supplier.details2', 'unit'])->where('tblmaterial.strMaterialID', $request->material_id)
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
