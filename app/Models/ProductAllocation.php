<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAllocation extends Model
{
    protected $table = 'tblprodallocation';
    protected $primaryKey = 'strProdAllocationID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'strJobOrderID',
    	'strStageID',

    ];
    // public function purchase() {
    //     return $this->belongsTo('App\Models\Purchase', 'strPurchaseID', 'strPurchaseID');
    // }
    // public function orders(){
    //     return $this->hasMany('App\Models\ReceivePurchaseDetail', 'strReceivePurchaseID','strReceivePurchaseID');
    // }
    public function stage(){
        return $this->hasMany('App\Models\Stage','strStageID','strStageID');
    }

    public function joborder(){
        return $this->belongsTo('App\Models\QuoteJobOrder', 'strJobOrderID', 'strJobOrderID');
    }

    public function detail(){
        return $this->hasMany('App\Models\ProductAllocationDetail','strProdAllocationID','strProdAllocationID');
    }
}
