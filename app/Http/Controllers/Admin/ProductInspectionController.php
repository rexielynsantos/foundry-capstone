<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;
use App\Models\ProductInspection;
use App\Models\Employee;
use App\Models\Product;
use App\Models\JobTicketDetail;



class ProductInspectionController extends Controller
{
    public function viewInspection(){
        $ins = ProductInspection::with(['employee', 'product.details'])->get();
        $emp = Employee::where('strStatus','Active')->get();
        $prod = Product::where('strStatus', 'Active')->get();

        return view('Transaction.inspection')
        ->with('ins',$ins)
        ->with('emp',$emp)
        ->with('prod',$prod);
    }

    public function editInspection(Request $request){
        $ins = ProductInspection::with(['employee', 'product.details'])->where('StrProdInspectionID', '=', $request->input('insp_id'))->first();
        return $ins;
    }

    public function addInspection(Request $request){
        $id = $request->input('insp_id');

        ProductInspection::where('StrProdInspectionID', '=', $id)->delete();

        ProductInspection::insert([
            'StrProdInspectionID' => $id,
            'strEmployeeID' => $request->input('emp_id'),
            'strProductID' => $request->input('prod_id'),
            'timeInspected' => $request->input('time'),
            'forInspection' => $request->input('inspect'),
            'intAcceptHardness' => $request->input('a_hardness'),
            'intAcceptQty' => $request->input('a_quantity'),
            'intReworkHardness' => $request->input('r_hardness'),
            'intReworkQty' => $request->input('r_quantity')
        ]);

        $ins = ProductInspection::with(['employee', 'product.details'])->where('StrProdInspectionID', '=', $id)->first();
        return $ins;
    }
}
