<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAllocationDetail extends Model
{
    protected $table = 'tblprodallocationdetail';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
   		'strProdAllocationID',
        'strProductID',
    	'intQtyToUse',
    ];
    // public function purchase() {
    //     return $this->belongsTo('App\Models\Purchase', 'strPurchaseID', 'strPurchaseID');
    // }
    // public function orders(){
    //     return $this->hasMany('App\Models\ReceivePurchaseDetail', 'strReceivePurchaseID','strReceivePurchaseID');
    // // }
    public function product(){
        return $this->hasOne('App\Models\Product','strProductID','strProductID');
    }

    // public function joborder(){
    //     return $this->belongsTo('App\Models\QuoteJobOrder', 'strJobOrderID', 'strJobOrderID');
    // }
}
