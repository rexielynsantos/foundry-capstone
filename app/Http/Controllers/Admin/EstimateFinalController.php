<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstimateFinalController extends Controller
{
    public function viewEstimate()
    {

      // return Response::json($product);
      return view('Transaction.estimate-final')

    }
}
