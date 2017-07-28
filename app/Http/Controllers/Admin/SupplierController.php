<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use DB;
use Response;

class SupplierController extends Controller
{
    public function viewSupplier()
  {
    $product = Supplier::where('strStatus','Active')->get();

      // return Response::json($product);
      return view('Purchasing.supplier')
      ->with('supp',$product);
  }

	 public function addSupplier(Request $request)
	  {

      $id = str_random(10);
      Supplier::insert([
        'strSupplierID' => $id,
        'strSupplierName' => $request->supplier_name,
        'strSupStreet' => $request->supplier_street,
        'strSupBrgy' => $request->supplier_brgy,
        'strSupCity' => $request->supplier_city,
        'strSupplierDesc' => $request->supplier_desc,
        'strStatus' => 'Active',
      ]);
    // DB::commit();
    $supplier =Supplier::where('strStatus','Active')->get();
    // return Response::json($supplier);
    return $supplier;

  }
  public function editSupplier(Request $request)
  {
    $product = DB::table('tblsupplier')
                ->where('tblsupplier.strSupplierID', '=' , $request->input('supplier_id'))
                ->get();
    return Response::json($product);
  }
   public function updateSupplier(Request $request)
  {
    Supplier::where('strSupplierID', $request->supplier_id)->update([
       'strSupplierName' => $request->supplier_name,
        'strSupStreet' => $request->supplier_street,
        'strSupBrgy' => $request->supplier_brgy,
        'strSupCity' => $request->supplier_city,
        'strSupplierDesc' => $request->supplier_desc,
      ]);
    $supplier = Supplier::where('strSupplierID', $request->supplier_id)->get();
    return $supplier;

  }
   public function deleteSupplier(Request $request)
  {
    foreach ($request->input('supplier_id') as $supplierID) {
      DB::table('tblsupplier')
      ->where('tblsupplier.strSupplierID', '=', $supplierID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }
  public function reactivateSupplier()
  {
    $supplier = DB::table('tblsupplier')
                ->where('tblsupplier.strStatus', '=' , 'Inactive')
                ->get();
      // return Response::json($product);
      return view('Purchasing.supplierReactivation')
      ->with('supplier',$supplier);
  }
  public function activateSupplier(Request $request)
  {
    foreach ($request->input('supplier_id') as $supplierID) {
      DB::table('tblsupplier')
      ->where('tblsupplier.strSupplierID', '=', $supplierID)
      ->update([
        'strStatus' => 'Active',
      ]);
    }
  }
  public function statusSupplier(Request $request)
  {
    $status = Supplier::where('strSupplierName', '=', $request->input('supplier_name'))->get();


    return response()->json($status);
  }

  public function activeSupplier(Request $request)
  {
      Supplier::where('strSupplierName', '=', $request->input('supplier_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $supplier = Supplier::where('strSupplierName', $request->supplier_name)->first();
      return $supplier;

  }


}
