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
    public function getAllVariant()
    {
      $variant = ProductVariant::where('strStatus', 'Active')->get();

      return response()->json($variant);
    }
    public function viewProduct()
    {

      $product = Product::with('productvariant.details3')
      ->where('strStatus', 'Active')->get();

      $type = ProductType::where('strStatus', 'Active')->get();

      return view('Production.product')
      ->with('product', $product)
      ->with('type', $type);
  	}
  	public function addProduct(Request $request){
      $id = str_random(10);
      $imageName = "";
      $tempID="";
      if($request->hasFile('prod_image'))
        {
          $tempID = $id.'.'.$request->prod_image->getClientOriginalExtension();
          $imageName = $request->file('prod_image')->storeAs(
              'public/product', $tempID
          );
        }

      Product::insert([
        'strProductID' => $id,
        'strProductName' => $request->input('product_name'),
        'strProductTypeID' => $request->input('ptype_id'),
        'strProductImagePath' => $imageName,
        'strTempImage' => $tempID,
        'strProductDesc' => $request->input('product_desc'),
        'strStatus' => 'Active'
        ]);

      if($request->input('variant_data') != ''){
        foreach($request->input('variant_data') as $var){
         ProductDetail::insert([
            'strProductID' => $id,
            'strProductVariantID' => $var
          ]);
        }
      }

      $product = Product::with(['productvariant.details3', 'producttype'])->where('strProductID', $id)->first();

      return $product;
    }
    public function editProduct(Request $request)
    {


      $product = DB::table('tblproduct')
                ->where('strProductID', $request->product_id);

      Product::with(['productvariant.details3', 'producttype'])->where('strProductID', $request->product_id)
                ->first();

      ProductDetail::where('strProductID', $request->product_id)->get();

      return response()->json(['product' => $product, 'var' => $var]);

    
    $product = Product::with(['productvariant.details3', 'producttype'])->where('strProductID', $request->product_id)->first();
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

      ProductDetail::where('strProductID', $request->product_id)
        ->delete();

      if($request->input('variant_data') != ''){
        foreach($request->input('variant_data') as $variant){
          ProductDetail::insert([
            'strProductID' => $request->product_id,
            'strProductVariantID' => $variant
          ]);
        }
      }
      $product = Product::with(['supplier.details3', 'producttype'])->where('tblproduct.strProductID', $request->product_id)->first();
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


}
