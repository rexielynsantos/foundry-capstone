<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;
use App\Models\MatSpec;
use App\Models\MatSpecDetail;
use App\Models\Material;
use App\Models\Unit;
use App\Models\Product;


class MaterialSpecController extends Controller
{

	public function viewMatSpec()
    {
      // $matspec = MatSpec::with('material.matdetails')->where('strStatus', 'Active')->get();
      $unit = Unit::where('strStatus', 'Active')->get();
      $mat = Material::where('strStatus','Active')->get();
      $prodct = Product::where('strStatus', 'Active')->get();

        // return Response::json($material);
        return view('Transaction.jobOrder-monitoring')
        ->with('matr',$mat)
        ->with('unit', $unit)
        ->with('prodct', $prodct);

    }

  public function showProductType(Request $request)
    {
			$prod = DB::table('tblproducttype')
        ->leftjoin('tblproduct', 'tblproduct.strProductTypeID', '=', 'tblproducttype.strProductTypeID')
        ->where('tblproduct.strProductName', $request->prod_name)
        ->get();

			return Response::json($prod);
    }

    public function addMatSpec(Request $request)
    {
      $id = str_random(10);
      MatSpec::insert([
        'strMatSpecID' => $id,
        'strProductID' => $request->input('product_id'),
        'strStatus' => 'For Review'
        ]);

      if($request->input('mat_data') != ''){
        foreach($request->input('mat_data') as $mat){
          MatSpecDetail::insert([
            'strMatSpecID' => $id,
            'strMaterialID' => $mat
          ]);
        }
      }
      $mat = MatSpec::with(['material.matdetails', 'unit', 'product'])->where('strMatSpecID', $id)->first();
      return $mat;
    }
    public function editMatSpec(Request $request)
    {
    $mat = MatSpec::where('strMatSpecID', $request->matspec_id);

    return $$mat;
    }

    public function approveMatSpec(Request $request)
    {
    MatSpec::where('strMatSpecID', $request->matspec_id)
    ->update([
    		'strMatSpecID' => $request->matspec_id,
    		'strProductID' => $request->product_id,
        	'strStatus' => 'Approved'
    ]);

    MatSpecDetail::where('strMatSpecID', $request->matspec_id)
    ->delete();

     if($request->input('mat_data') != ''){
          foreach($request->input('mat_data') as $mat){
            MatSpecDetail::insert([
              'strMatSpecID' => $request->matspec_id,
              'strMaterialID' => $mat
            ]);
          }
      }
 	$mat = MatSpec::with(['material.matdetails', 'unit', 'product'])->where('strMatSpecID', $id)->first();
      return $mat;
  }
}
