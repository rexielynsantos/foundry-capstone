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
    $id = str_random(10);
    Unit::insert([
      'strUOMID' => $id,
      'strUOMName' => $request->input('uom_name'),
      'strUOMDesc' => $request->input('uom_desc'),
      'strUOMTypeID' => $request->input('uomtype_id'),
      'strStatus' => 'Active',
    ]);

    $product = Unit::with('unittype')->where('strStatus', 'Active')->get();
    return Response::json($product);
  }
  public function editUOM(Request $request)
  {
    $product = DB::table('tbluom')
                ->leftjoin('tbluomtype','tbluomtype.strUOMTypeID','=','tbluom.strUOMTypeID')
                ->select('tbluom.*','tbluomtype.strUOMTypeName')
                ->where('tbluom.strUOMID', '=', $request->input('uom_id'))
                ->get();
    return Response::json($product);
  }

  public function updateUOM(UOMRequest $request)
  {
    DB::table('tbluom')
    ->where('tbluom.strUOMID', '=', $request->input('uom_id'))
    ->update([
      'strUOMName' => $request->input('uom_name'),
      'strUOMDesc' => $request->input('uom_desc'),
      'strUOMTypeID' => $request->input('uomtype_id'),
    ]);

    $productUOM = DB::table('tbluom')
                ->leftjoin('tbluomtype','tbluomtype.strUOMTypeID','=','tbluom.strUOMTypeID')
                ->select('tbluom.*','tbluomtype.strUOMTypeName')
                ->where('tbluom.strUOMID', '=' , $request->input('uom_id'))
                ->get();
    $uomType = DB::table('tbluomtype')
                ->where('tbluomtype.strStatus', '=' , 'Active')
                ->get();
    return Response::json($productUOM);
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
    $product = DB::table('tbluom')
                ->leftjoin('tbluomtype','tbluomtype.strUOMTypeID','=','tbluom.strUOMTypeID')
                ->select('tbluom.*','tbluomtype.strUOMTypeName')
                ->where('tbluom.strStatus', '=' , 'Inactive')
                ->get();
    $uomType = DB::table('tbluomtype')
                ->where('tbluomtype.strStatus', '=' , 'Inactive')
                ->get();
      // return Response::json($product);
      return view('Reactivation.uomReactivation')
      ->with('productUOM',$product)
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
