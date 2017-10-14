<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;
// use App\Models\MaterialSupplier;
use App\Models\MaterialDetail;
use App\Models\MaterialSupplier;
use App\Models\MaterialVariant;
use App\Models\Supplier;
use App\Models\Unit;
use DB;
use Response;
class MaterialController extends Controller
  {

    public function getMaterialMax(){
    $id = DB::table('tblmaterial')
          ->select('strMaterialID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strMaterialID', 'desc')
          ->first();

    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strMaterialID;

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
      $somenew = 'MAT00001';
     }
    return response()->json($somenew);
  }

    public function getAllVariant()
    {
      $variant = MaterialVariant::with('unit')->  where('strStatus', 'Active')->get();

      return response()->json($variant);
    }
    public function getAllSupplier()
    {
      $supli = Supplier::where('strStatus','Active')->get();

      return response()->json($supli);
    }
    public function getAllUOM()
    {
      $unit = Unit::where('strStatus', 'Active')->get();

      return response()->json($unit);
    }
    public function viewMaterial()
    {
      $material = Material::with(['materialsupplier.supplier'])->where('strStatus', 'Active')->get();
        return view('Purchasing.material')
        ->with('matr',$material);
    }
  //   public function getSelectedVariant(Request $request)
  //   {

  //     $variant = DB::table('tblmaterialvariant')
  //             ->join('tblmaterialdetail', 'tblmaterialdetail.strMaterialVariantID', '=', 'tblmaterialvariant.strMaterialVariantID')
  //             ->select('tblmaterialvariant.*')
  //             ->where('tblmaterialdetail.strMaterialID', '=', $request->variant_data)
  //             ->get();
  //     return Response::json($variant);

  //   }
  //   public function addCart(Request $request)
  //   {
  //     // $supp = Supplier::where('strSupplierName',  $request->supplier_data)->get();
  //     // return response()->json($supp);
  //     $supp = DB::table('tblsupplier')
  //      ->where('tblsupplier.strSupplierID', $request->supplier_data)
  //       ->get();
  //       return Response::json($supp);

  //     }
    public function addMaterial(Request $request)
    {
      $id = $request->input('id');
      Material::insert([
        'strMaterialID' => $id,
        'strMaterialName' => $request->input('material_name'),
        'strMaterialVariantID' => $request->input('variant_data'),
        'intReorderLevel' => $request->input('reorder_level'),
        'intReorderQty' => $request->input('reorder_qty'),
        'strUOMID' => $request->input('uom_id'),
        'dblBasePrice' => $request->input('base_price'),
        'strMaterialDesc' => $request->input('material_desc'),
        'created_at' => $request->input('created_at'),
        'strStatus' => 'Active'
        ]);


        // $ctr = 0;
        // foreach($request->input('variant_data') as $variant){
        //   MaterialDetail::insert([
        //     'strMaterialID' => $id,
        //     'strMaterialVariantID' => $variant,
        //   ]);

        // }
        // $ctr=0;

      // if($request->input('supplier_data') != ''){
        foreach($request->input('supplier_data') as $supplier){
          MaterialSupplier::insert([
            'strMaterialID' => $id,
            'strSupplierID' => $supplier,
          ]);
          // $ctr = $ctr + 1;
        }
      // }


      $material = Material::with(['materialsupplier.supplier','variant', 'unit'])->where('strMaterialID', $id)->first();
      return $material;
    }
    public function editMaterial(Request $request)
    {
      $material = Material::with(['materialsupplier.supplier','variant', 'unit'])->where('strMaterialID', $request->material_id)->first();

      return $material;
    }

    public function updateMaterial(Request $request)
    {
       Material::where('strMaterialID', $request->material_id)
        ->update([
            'strMaterialID' => $request->material_id,
            'strMaterialName' => $request->input('material_name'),
            'strMaterialVariantID' => $request->input('variant_data'),
            'intReorderLevel' => $request->input('reorder_level'),
            'intReorderQty' => $request->input('reorder_qty'),
            'strUOMID' => $request->input('uom_id'),
            'dblBasePrice' => $request->input('base_price'),
            'strMaterialDesc' => $request->input('material_desc'),
            'strStatus' => 'Active'
        ]);

      MaterialSupplier::where('strMaterialID', $request->material_id)
        ->delete();
      // MaterialDetail::where('strMaterialID', $request->material_id)
      // ->delete();

        // foreach($request->input('variant_data') as $variant){
        //   MaterialDetail::insert([
        //     'strMaterialID' => $request->material_id,
        //     'strMaterialVariantID' => $variant,
        //   ]);
          // $ctr = $ctr + 1;
        // }
        // $ctr=0;

      // if($request->input('supplier_data') != ''){
        foreach($request->input('supplier_data') as $supplier){
          MaterialSupplier::insert([
            'strMaterialID' => $request->material_id,
            'strSupplierID' => $supplier,
          ]);
          // $ctr = $ctr + 1;
        }
    $material = Material::with(['materialsupplier.supplier', 'unit'])->where('tblmaterial.strMaterialID', $request->material_id)
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


  //   public function reactivateMaterial()
  //   {
  //     $product = DB::table('tblmaterial')
  //                 ->where('tblmaterial.strStatus', '=' , 'Inactive')
  //                 ->get();


  //       // return Response::json($product);
  //       return view('Reactivation.materialReactivation')
  //       ->with('material',$product);
  //   }

  //   public function activateMaterial(Request $request)
  //   {
  //     foreach ($request->input('material_id') as $materialID) {
  //       DB::table('tblmaterial')
  //       ->where('tblmaterial.strMaterialID', '=', $materialID)
  //       ->update([
  //         'strStatus' => 'Active',
  //       ]);
  //     }
  //   }

    public function statusMaterial(Request $request)
  {
    $status = Material::where('strMaterialName', '=', $request->input('material_name'))->get();


    return response()->json($status);
  }

  public function activeMaterial(Request $request)
  {
      Material::where('strMaterialName', '=', $request->input('material_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $material = Material::with(['materialsupplier.supplier','variant', 'unit'])->where('strMaterialName', $request->material_name)->first();
      return $material;

  }

}
