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

  public function getMatSpecMax(){
    $id = DB::table('tblmatspec')
          ->select('strMatSpecID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strMatSpecID', 'desc')
          ->first();
    
    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strMatSpecID;

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
      $somenew = 'MS00001';
     }
    return response()->json($somenew);
  }

	public function viewMatSpec()
    {
       $matspec = MatSpec::with('material.details.unit', 'product.producttype')->where('strStatus','Active')->get();
      $unit = Unit::where('strStatus', 'Active')->get();
      $mat = Material::where('strStatus','Active')->get();
      $prodct = Product::where('strStatus', 'Active')->get();

        // return Response::json($matspec);
        return view('Transaction.jobOrder-monitoring')
        ->with('matr',$mat)
        ->with('unit', $unit)
        ->with('prodct', $prodct)
        ->with('matspec', $matspec);

    }

  public function showProductType(Request $request)
    {
			$prod = DB::table('tblproducttype')
        ->leftjoin('tblproduct', 'tblproduct.strProductTypeID', '=', 'tblproducttype.strProductTypeID')
        ->where('tblproduct.strProductID', $request->prod_id)
        ->get();

			return Response::json($prod);
    }

public function addCart(Request $request)
    {

      $matt = Material::with(['unit'])->where('strMaterialName',  $request->mat_data)->get();
      return response()->json($matt);

    }
    public function addMatSpec(Request $request)
    {
      $id = $request->input('id');
      MatSpec::insert([
        'strMatSpecID' => $id,
				'strVarianceCode' => $request->input('variance_code'),
        'strProductID' => $request->input('product_id'),
        'created_at' => $request->input('created_at'),
        'strStatus' => 'Active'
        ]);

			$qty = $request->input('mat_qty');
      $ctr = 0;
      if($request->input('mat_data') != ''){
        foreach($request->input('mat_data') as $prvr){
          MatSpecDetail::insert([
            'strMatSpecID' => $id,
            'strMaterialID' => $prvr,
            'dblMaterialQuantity' => $qty[$ctr]
          ]);
          $ctr = $ctr + 1;
        }
      }

      $prdvrc = MatSpec::with(['material.details.unit', 'product.producttype'])->where('strMatSpecID', $id)->first();
      return $prdvrc;
    }
    public function editMatSpec(Request $request)
    {
    $mattt = MatSpec::with(['material.details', 'product'])
		->where('strMatSpecID', '=', $request->matspec_id)
		->first();
    return $mattt;
    }

		public function updateMatSpec(Request $request)
		{
		  // dd($request->all());
			$id = $request->input('tmp_id');

			Matspec::where('strMatSpecID', '=', $id)
							->update([
			        'strProductID' => $request->input('product_id'),
							'strVarianceCode' => $request->input('variance_code'),
			        'strStatus' => 'Active'
			        ]);

			 MatSpecDetail::where('strMatSpecID', $id)->delete();

			 $qty = $request->input('mat_qty');
       $ctr = 0;

       if($request->input('mat_data') != ''){
         foreach($request->input('mat_data') as $prvr){
           DB::table('tblmatspecdetail')
					 ->insert([
             'strMatSpecID' => $id,
             'strMaterialID' => $prvr,
             'dblMaterialQuantity' => $qty[$ctr]
           ]);
           $ctr = $ctr + 1;
         }
       }

       $prdvrc = MatSpec::with(['material.details.unit', 'product.producttype'])->where('strMatSpecID', $id)->first();
       return $prdvrc;
		}

		public function deleteMatSpec(Request $request)
	  {
	    foreach ($request->input('matspec_id') as $matspecID) {
	      DB::table('tblmatspec')
	      ->where('tblmatspec.strMatSpecID', '=', $matspecID)
	      ->update([
	        'strStatus' => 'Inactive',
	      ]);
	    }
	  }

    public function statusMatSpec(Request $request)
  {
    $status = MatSpec::where('strVarianceCode', '=', $request->input('variance_code'))->get();


    return response()->json($status);
  }

  public function activeMatSpec(Request $request)
  {
      MatSpec::where('strVarianceCode', '=', $request->input('variance_code'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $matspec = MatSpec::with(['material.details.unit', 'product.producttype'])->where('strVarianceCode', $request->variance_code)->first();
      return $matspec;

  }

}
