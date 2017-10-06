<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivePurchase extends Model
{
    protected $table = 'tblreceivepurchase';
    protected $primaryKey = 'strReceivePurchaseID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'strPurchaseID',
    	'dtDeliveryReceived',
        'isActive',


    ];
    public function purchase() {
        return $this->belongsTo('App\Models\Purchase', 'strPurchaseID', 'strPurchaseID');
    }
    public function detail(){
        return $this->hasMany('App\Models\ReceivePurchaseDetail', 'strReceivePurchaseID','strReceivePurchaseID');
    }
    public function order() {
            return $this->hasMany('App\ReceivePurchaseOrder', 'strReceivePurchaseID');
    }

}
