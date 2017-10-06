<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UOMRequest;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\UnitType;
use DB;
use Response;
class UOMController extends Controller
{
  public function getMax(){
    $id = DB::table('tbluom')
          ->select('strUOMID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strUOMID', 'desc')
          ->first();
    
    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strUOMID;

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
      $somenew = 'U00001';
     }
    return response()->json($somenew);
  }

  public function viewUOM()
  {
    $uom = Unit::with('unittype')->where('strStatus', 'Active')->get();
    $uomType = DB::table('tbluomtype')
                ->where('tbluomtype.strStatus', '=' , 'Active')
                ->get();
      // return Response::json($product);
      return view('Utilities.UnitOfMeasurement')
      ->with('productUOM',$uom)
      ->with('uomType',$uomType);
  }

  public function addUOM(UOMRequest $request)
  {
    Unit::insert([
      'strUOMID' => $request->input('id'),
      'strUOMName' => $request->input('uom_name'),
      'strUOMDesc' => $request->input('uom_desc'),
      'created_at' => $request->input('created_at'),
      'strStatus' => 'Active',
    ]);

    $product = Unit::where('strUOMID', $request->input('id'))->get();
    return Response::json($product);
  }

  public function editUOM(Request $request)
  {
    $unit = Unit::where('strUOMID', $request->uom_id)->get();
    // return $unit;
    return Response::json($unit);
  }

  public function updateUOM(UOMRequest $request)
  {
    DB::table('tbluom')
    ->where('tbluom.strUOMID', '=', $request->input('uom_id'))
    ->update([
      'strUOMName' => $request->input('uom_name'),
      'strUOMDesc' => $request->input('uom_desc'),
    ]);

    $unit = Unit::where('strUOMID', $request->uom_id)->get();
    $uomType = DB::table('tbluomtype')
                ->where('tbluomtype.strStatus', '=' , 'Active')
                ->get();
    return Response::json($unit);
  }

  public function deleteUOM(Request $request)
  {
    foreach ($request->input('uom_id') as $uomID) {
      DB::table('tbluom')
      ->where('tbluom.strUOMID', '=', $uomID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }

  public function reactivateUOM()
  {
    $unit = Unit::where('strStatus', 'Inactive')->get();

    $uomType = DB::table('tbluomtype')
                ->where('tbluomtype.strStatus', '=' , 'Inactive')
                ->get();
      // return Response::json($product);
      return view('Reactivation.uomReactivation')
      ->with('productUOM',$unit)
      ->with('uomType',$uomType);
  }

  public function activateUOM(Request $request)
  {
    foreach ($request->input('uom_id') as $actID) {
      DB::table('tbluom')
      ->where('tbluom.strUOMID', '=', $actID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }

  public function statusUOM(Request $request)
  {

    $status = Unit::where('strUOMName', '=', $request->input('uom_name'))->get();

    // $status = Unit::where('strUOMName', '=', $request->input('uomtype_name'))->get();

    return response()->json($status);
  }

  public function activeUOM(Request $request)
  {
      Unit::where('strUOMName', '=', $request->input('uom_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $uomtype = Unit::with('unittype')->where('strUOMName', $request->uom_name)->first();
      return $uomtype;
  }

}
