<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Supplier;

class ReceiveAddMaterialsController extends Controller
{
    public function viewReceiveAddPurchase()
    {
	
	$purchase = Purchase::where('strStatus', 'Pending')->get();
	$receivedFrom = Supplier::get();
      // return Response::json($purchase);
      return view('Transaction.receive-add')
      ->with('purchase',$purchase)
      ->with('receivedFrom',$receivedFrom);
    }
}
