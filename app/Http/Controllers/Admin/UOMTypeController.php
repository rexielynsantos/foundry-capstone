<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\UOMTypeRequest;
use App\Http\Controllers\Controller;
use App\Models\UnitType;
use DB;
use Response;
class UOMTypeController extends Controller
{
  public function viewUOMType()
  {

    $unittype = UnitType::where('strStatus', 'Active')->get();

      return view('Production.uomType')
      ->with('UOMType',$unittype);

  }
  public function addUOMType(UOMTypeRequest $request)
  {
    $id = str_random(10);
    UnitType::insert([
      'strUOMTypeID' => $id,
      'strUOMTypeName' => $request->input('uomtype_name'),
      'strUOMTypeDesc' => $request->input('uomtype_desc'),
      'strStatus' => 'Active',
    ]);
    $unittype = UnitType::where('strUOMTypeID', $id)->get();
    return $unittype;
  }
  public function editUOMType(Request $request)
  {
    $unittype = UnitType::where('strUOMTypeID', $request->uomtype_id)->get();
    return $unittype;
  }

  public function updateUOMType(UOMTypeRequest $request)
  {
    UnitType::where('strUOMTypeID', $request->uomtype_id)
    ->update([
      'strUOMTypeName' => $request->uomtype_name,
      'strUOMTypeDesc' => $request->uomtype_desc,
      ]);
    $unittype = UnitType::where('strUOMTypeID', $request->uomtype_id)->get();
    return $unittype;

  }


  public function deleteUOMType(Request $request)
  {
    foreach ($request->input('uomtype_id') as $uomTypeID) {
      DB::table('tbluomtype')
      ->where('tbluomtype.strUOMTypeID', '=', $uomTypeID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }
  public function reactivateUOMType()
  {
    $product = DB::table('tbluomtype')
                ->where('tbluomtype.strStatus', '=' , 'Inactive')
                ->get();
      // return Response::json($product);
      return view('Reactivation.uomTypeReactivation')
      ->with('UOMType',$product);
  }
  public function activateUOMType(Request $request)
  {
    foreach ($request->input('uomtype_id') as $actID) {
      DB::table('tbluomtype')
      ->where('tbluomtype.strUOMTypeID', '=', $actID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }

  public function statusUOMType(Request $request)
  {
    $status = UnitType::where('strUOMTypeName', '=', $request->input('uomtype_name'))->get();


    return response()->json($status);
  }

  public function activeUOMType(Request $request)
  {
      UnitType::where('strUOMTypeName', '=', $request->input('uomtype_name'))

      ->update([
        'strStatus' => 'Active',
      ]);


      $uomtype = UnitType::where('strUOMTypeName', $request->uomtype_name)->first();

      $uomtype = UnitType::where('strUOMTypeName', $request->stage_name)->first();

      return $uomtype;

  }
}
