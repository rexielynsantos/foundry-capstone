<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteProductVariant extends Model
{
    protected $table = 'tblquoteproductvariant';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
      'strQuoteID',
	    'strProductID',
	    // 'strProductVariantID',
      'strVarianceCode',
      'dblRequestCost',
      'intOrderQty',
      'strRemarks',
      'strStatus'
    ];
    public function details6(){
        return $this->hasOne('App\Models\ProductVariant','strProductVariantID','strProductVariantID');
    }
    public function details4(){
        return $this->hasOne('App\Models\Product','strProductID','strProductID');
    }
    // public function quotation(){
    //   return $this->hasOne('App\Models\Quotation', 'strQuoteID', 'strQuoteID');
    // }
    // public function jobproduct(){
    //     return $this->hasOne('App\Models\QuoteJobOrder','strProductID','strProductID');
    // }

}
