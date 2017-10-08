<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Response;

class ReturnController extends Controller
{

  public function suppliers()
  {
    $supp = DB::table('tblsupplier')->where('strStatus', 'Active')->get();

    return Response::json($supp);
  }


}
