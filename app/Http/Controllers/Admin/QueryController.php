<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;

class QueryController extends Controller
{
    public function viewTable1Info()
    {
      $mostProducts = DB::table('tblcosting')
              ->select('strProductID')
              ->groupBy('strProductID')
              ->orderByRaw('COUNT(*) DESC')
              ->limit(1)
              ->get();

      return Response::json($mostProducts);
    }
}
