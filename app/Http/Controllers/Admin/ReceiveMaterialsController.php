<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;
use App\Models\ReceivePurchase;
use App\Models\ReceivePurchaseDetail;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Material;

class ReceiveMaterialsController extends Controller
{
    public function viewReceivePurchase()
    {
  
     $rp = ReceivePurchase::with('orders.details')->get();
     return view('Transaction.receivePurchase')
     ->with('rp', $rp);
    }
}
