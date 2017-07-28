<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\OptionRequest;
use App\Http\Controllers\Controller;
use DB;
use Response;
class OptionController extends Controller
{
  public function viewOption()
  {
    $product = DB::table('tbloption')
                ->where('tbloption.strStatus', '=' , 'Active')
                ->get();
      // return Response::json($product);
      return view('Production.option')
      ->with('option',$product);
  }
  public function addOption(OptionRequest $request)
  {
    try {
      DB::beginTransaction();
      $id = str_random(10);
      DB::table('tbloption')->insert([
      'strOptionID' => $id,
      'strOptionName' => $request->input('option_name'),
      'strOptionDesc' => $request->input('option_desc'),
      'strStatus' => 'Active',
    ]);
    DB::commit();
    $product = DB::table('tbloption')
                ->where('tbloption.strOptionID', '=' , $id)
                ->get();
    return Response::json($product);

    } catch (\Illuminate\Database\QueryException $e) {
      DB::rollback();
      return 'error';
    }
  }
  public function editOption(Request $request)
  {
    $product = DB::table('tbloption')
                ->where('tbloption.strOptionID', '=' , $request->input('option_id'))
                ->get();
    return Response::json($product);
  }
  public function updateOption(OptionRequest $request)
  {
    try {
      DB::beginTransaction();
      DB::table('tbloption')
        ->where('tbloption.strOptionID', '=', $request->input('option_id'))
        ->update([
            'strOptionName' => $request->input('option_name'),
            'strOptionDesc' => $request->input('option_desc'),
          ]);
      DB::commit();
    $option = DB::table('tbloption')
                ->where('tbloption.strOptionID', '=' , $request->input('option_id'))
                ->get();
    return Response::json($option);

    } catch (Exception $e) {
      DB::rollback();
      return 'error';
    }

  }

  public function deleteOption(Request $request)
  {
    foreach ($request->input('option_id') as $optionID) {
      DB::table('tbloption')
      ->where('tbloption.strOptionID', '=', $optionID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }

  // public function reactivateOption()
  // {
  //   $product = DB::table('tbloption')
  //               ->where('tbloption.strStatus', '=' , 'Inactive')
  //               ->get();
  //     // return Response::json($product);
  //     return view('Reactivation.OptionReactivation')
  //     ->with('Option',$product);
  // }

  // public function activateOption(Request $request)
  // {
  //   foreach ($request->input('Option_id') as $OptionID) {
  //     DB::table('tbloption')
  //     ->where('tbloption.strOptionID', '=', $OptionID)
  //     ->update([
  //       'strStatus' => 'Active',
  //     ]);
  //   }
  // }

}
