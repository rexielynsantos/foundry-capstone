<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductVariant;
use App\Models\ProductType;
use DB;
use Response;

class ProductController extends Controller
{

    public function getProductMax(){
    $id = DB::table('tblproduct')
          ->select('strProductID')
          ->orderBy('created_at', 'desc')
          ->orderBy('strProductID', 'desc')
          ->first();
    
    $new = "";
     $somenew = "";
     $arrNew = [];
     $boolAdd = TRUE;

     if($id != ''){
        $idd = $id->strProductID;

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
      $somenew = 'PROD00001';
     }
    return response()->json($somenew);
  }

    public function viewProduct()
    {

      $product = Product::with('producttype')->where('strStatus', 'Active')->get();

      $type = ProductType::where('strStatus', 'Active')->get();

      return view('Production.product')
      ->with('product', $product)
      ->with('type', $type);
    }
    public function addProduct(Request $request){
      $id = $request->input('id');

      Product::insert([
        'strProductID' => $id,
        'strProductName' => $request->input('product_name'),
        'strProductTypeID' => $request->input('ptype_id'),
        'strProductDesc' => $request->input('product_desc'),
        'created_at' => $request->input('created_at'),
        'strStatus' => 'Active'
        ]);

      // if($request->input('variant_data') != ''){
      //   foreach($request->input('variant_data') as $var){
      //    ProductDetail::insert([
      //       'strProductID' => $id,
      //       'strProductVariantID' => $var
      //     ]);
      //   }
      // }

      $product = Product::with(['producttype'])->where('strProductID', $id)->first();
      
      return $product;
    }
    public function editProduct(Request $request)
    {
    
    $product = Product::with(['producttype'])->where('strProductID', $request->product_id)->first();
    return $product;
    }
    public function updateProduct(Request $request)
    {

     Product::where('strProductID', $request->product_id)
        ->update([
          'strProductName' => $request->input('product_name'),
          'strProductTypeID' => $request->input('ptype_id'),
          'strProductDesc' => $request->input('product_desc'),
          'strStatus' => 'Active'
        ]);

      // ProductDetail::where('strProductID', $request->product_id)
      //   ->delete();

      // if($request->input('variant_data') != ''){
      //   foreach($request->input('variant_data') as $variant){
      //     ProductDetail::insert([
      //       'strProductID' => $request->product_id,
      //       'strProductVariantID' => $variant
      //     ]);
      //   }
      // }
      $product = Product::with(['producttype'])->where('tblproduct.strProductID', $request->product_id)->first();
      return $product;
    }
    public function deleteProduct(Request $request)
  {
    foreach ($request->input('product_id') as $productID) {
      DB::table('tblproduct')
      ->where('tblproduct.strProductID', '=', $productID)
      ->update([
        'strStatus' => 'Inactive',
      ]);
    }
  }

  public function statusProduct(Request $request)
  {
    $product = Product::where('strProductName', '=', $request->input('product_name'))->get();


    return response()->json($product);
  }

  public function activeProduct(Request $request)
  {
      Product::where('strProductName', '=', $request->input('product_name'))

      ->update([
        'strStatus' => 'Active',
      ]);

      $product = Product::with(['producttype'])->where('strProductName', $request->product_name)->first();
      return $product;

  }


}
