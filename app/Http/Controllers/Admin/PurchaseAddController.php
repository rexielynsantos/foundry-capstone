<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
// use App\Http\Requests\PurchaseRequest;
// use App\Mail\Purchase;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\Supplier;
use App\Models\MaterialVariant;
use App\Models\Material;
use App\Models\MaterialDetail;
use App\Models\MaterialSupplier;
use App\Models\PaymentTerm;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\PurchMatVariantDetail;
use DB;
use Response;
use Session;
use PDF;

class PurchaseAddController extends Controller
{
  public function getPurchaseAddMax(){
    $id = DB::table('tblpurchase')
          ->select('strPurchaseID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strPurchaseID', 'desc')
          ->first();

    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strPurchaseID;

      $arrID = str_split($idd);



       for($ctr = count($arrID) - 1; $ctr >= 0; $ctr--)
       {
         $new = $arrID[$ctr];

         if($boolAdd)
         {

           if(is_numeric($new) || $new == '0')
           {
             if($new == '9')
             {
               $new = '0';
               $arrNew[$ctr] = $new;
             }
             else
             {
               $new = $new + 1;
               $arrNew[$ctr] = $new;
               $boolAdd = FALSE;
             }//else
           }//if(is_numeric($new))
           else
           {
             $arrNew[$ctr] = $new;
           }//else
         }//if ($boolAdd)

         $arrNew[$ctr] = $new;
       }//for

       for($ctr2 = 0; $ctr2 < count($arrID); $ctr2++)
       {
         $somenew = $somenew . $arrNew[$ctr2] ;
      }
     }
     else{
      $somenew = 'P00001';
     }
    return response()->json($somenew);
  }

    public function getAllMaterial(){
      $material = Material::with(['variant', 'variant.unit'])->get();
      // $materialvariant = MaterialVariant::get();

      // return response()->json(['material' => $variant, 'mater' => $type]);
      return $material;
         }

    public function getAllMaterialVariant(Request $request){

       $matVar = DB::table('tblmaterialdetail')
        ->leftjoin('tblmaterialvariant', 'tblmaterialvariant.strMaterialVariantID', '=', 'tblmaterialdetail.strMaterialVariantID')
        ->leftjoin('tbluom', 'tblmaterialvariant.strUOMID', '=', 'tbluom.strUOMID')
        ->where('tblmaterialdetail.strMaterialID', $request->material_id)
        ->get();

      return $matVar;

    }

    public function matvari(Request $request)
  {
    dd($request->all());
    $matVariant = DB::table('tblmaterialdetail')
      ->leftjoin('tblmaterialvariant', 'tblmaterialvariant.strMaterialVariantID', 'tblmaterialdetail.strMaterialVariantID')
      ->where('tblmaterialdetail.strMaterialID', $request->input('mat_id'))
      ->get();

    return Response::json($matVariant);
  }

    public function viewPurchase() {
    $purchase = Purchase::with('material.details', 'supplier', 'paymentterm')->get();

    // $pur = DB::table('tblmaterialvariant')
    //       ->leftjoin('tblpurchmatvariantdetail', 'tblpurchmatvariantdetail.strMaterialVariantID', 'tblmaterialvariant.strMaterialVariantID')
    //       ->get();
      // return Response::json($purchase);
      return view('Transaction.purchaseOrder')
      ->with('purchase',$purchase);
      // ->with('pur', $pur);
    }

    public function viewAddPurchase(Request $request)
    {

     $supplier = Supplier::where('strStatus', 'Active')->get();
     $paymentterm = PaymentTerm::where('strStatus', 'Active')->get();
     $material = Material::where('strStatus', 'Active')->get();
     $unit = Unit::where('strStatus', 'Active')->get();
     // $purchase = Purchase::with(['material.details'])->where('strStatus', 'Pending')->get();

     return view('Transaction.purchase-add')
     ->with('supplier', $supplier)
     ->with('matt', $material)
     ->with('paymentterm', $paymentterm)
     ->with('unit', $unit);



    }
    public function htmltopdfview(Request $request)
    {
        $products = Purchase::with('material.details');
        view()->share('products',$products);
        if($request->has('download')){
            $pdf = PDF::loadView('purchase');
            return $pdf->download('Purchase.pdf');
        }
        return view('htmltopdfview');
    }
    public function showSupplierDetails(Request $request)
    {

    $suppl = DB::table('tblsupplier')
    ->where('strSupplierID', $request->supplier_id)
    ->first();

    return Response::json($suppl);
    }
    public function GetDetails(Request $request)
    {

    $suppl = DB::table('tblsupplier')
    ->where('strSupplierID', $request->supplier_name)
    ->get();


    return Response::json($suppl);

    }
     public function addCart(Request $request)
    {

      // foreach ($request->mat_data as $matcart) {
        $matt = DB::table('tblmaterial')
              ->leftjoin('tblmaterialvariant', 'tblmaterialvariant.strMaterialVariantID', 'tblmaterial.strMaterialVariantID')
              ->leftjoin('tbluom', 'tbluom.strUOMID', 'tblmaterialvariant.strUOMID')
              ->where('tblmaterial.strMaterialName',  $request->mat_data)
              ->get();
      // }
      return response()->json($matt);

    }
    public function addPurchaseOrder(Request $request)
    {
      // dd($request->all());
      $supplier = Supplier::where('strStatus', 'Active')->get();
       $paymentterm = PaymentTerm::where('strStatus', 'Active')->get();

      $id = $request->input('id');
      Purchase::insert([
        'strPurchaseID' => $id,
        'strSupplierID' => $request->input('sup_id'),
        'strSupplierContactPerson' => $request->input('sup_contact'),
        'strPaymentTermID' => $request->input('pterm_id'),
        'dateCreated' => $request->input('date_created'),
        'strPStatus' => 'Pending',
        'isFinalize' => '1',
        'isDelivered' => '1',
        'created_at' => $request->input('created_at')
        ]);


        if($request->input('mat_data') != ''){
          foreach($request->input('mat_data') as $material){
            PurchaseDetail::insert([
              'strPurchaseID' => $id,
              'strMaterialID' => $material[0],
            ]);
          }

          $uomNme = $request->input('uom');
          $counter = 0;
          foreach ($request->input('mat_var') as $matVar) {
            $vari = DB::table('tblmaterialvariant')
              ->select('strMaterialVariantID')
              ->leftjoin('tbluom', 'tbluom.strUOMID', '=', 'tblmaterialvariant.strUOMID')
              ->where('tblmaterialvariant.intVariantQty', $matVar)
              ->where('tbluom.strUOMName', $uomNme[$counter])
              ->first()
              ->strMaterialVariantID;

            $arr[] = $vari;
            $counter = $counter + 1;
          }

        $qty = $request->input('mat_qty');
        $cost = $request->input('mat_cost');
        $totQty= $request->input('total_qty');
        $ctr = 0;

          foreach($request->input('mat_data') as $material){
            DB::table('tblpurchmatvariantdetail')
              ->insert([
              'strPurchaseID' => $id,
              'strMaterialID' => $material[0],
              'strMaterialVariantID' => $arr[$ctr],
              'dblAddlQty' => $qty[$ctr],
              'totalQty' => $totQty[$ctr],
              'dblMaterialCost' => $cost[$ctr],
            ]);
            $ctr = $ctr + 1;


            $getMatID = DB::table('tblmaterial')
                      ->where('strMaterialID', $material[0])
                      ->first()
                      ->strMaterialID;
            $arrMatID[] = $getMatID;

            $getQty = DB::table('tblmaterial')
                      ->where('strMaterialID', $material[0])
                      ->first()
                      ->intQtyOnHand;
            $arrQtyOnHand[] = $getQty;
          }
          // dd($arrMatID);
          $ct = 0;
          foreach ($arrMatID as $matIdd) {
            $updateQty = $totQty[$ct] + $arrQtyOnHand[$ct];
            DB::table('tblmaterial')
                ->where('strMaterialID', $matIdd)
                ->update([
                  'intQtyOnHand' => $updateQty
                ]);
            $ct = $ct + 1;
          }

        }

        Session::put('supID',$request->input('sup_id'));
        Session::put('supContact',$request->input('sup_contact'));
        Session::put('ptermID',$request->input('pterm_id'));
        Session::put('purchaseID', $id);


    $purchase = Purchase::with('material.details','supplier', 'paymentterm')->where('strPurchaseID',$id)->first();
    return View('Transaction.purchase-add')
    ->with('purchase', $purchase)
    ->with('supplier', $supplier)
     ->with('paymentterm', $paymentterm);

    }

    public function purchaseFinal(Request $request)
    {
      $supp = DB::table('tblsupplier')
        ->leftjoin('tblpurchase', 'tblpurchase.strSupplierID' , 'tblsupplier.strSupplierID')
        ->where('tblpurchase.strPurchaseID', $request->input('purchase_id'))
        ->where('tblsupplier.strSupplierID', $request->input('supplier_id'))
        ->first();

      return Response::json($supp);
    }
    public function finalRead(Request $request)
  {

    $readFinal = DB::table('tblquoteproductvariant')
      ->leftjoin('tblmaterial', 'tblmaterial.strMaterialID', 'tblpurchasedetail.strMaterialID')
      ->leftjoin('tblmaterialvariant', 'tblmaterialvariant.strMaterialVariantID', 'tblpurchasedetail.strMaterialVariantID')
      ->leftjoin('tbluom', 'tbluom.strUOMID', 'tblmaterialvariant.strUOMID')
      ->where('tblpurchasedetail.strPurchaseID', $request->purchase_id)
      ->get();

    return Response::json($readFinal);
  }



}
