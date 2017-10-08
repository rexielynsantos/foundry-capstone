<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivePurchase extends Model
{
    protected $table = 'tblreceivepurchase';
    protected $primaryKey = 'strReceivePurchaseID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'strPurchaseID',
    	'dtDeliveryReceived',
        'isActive'
    ];
    public function purchase() {
        return $this->belongsTo('App\Models\Purchase', 'strPurchaseID', 'strPurchaseID');
    }
    public function order(){
        return $this->hasMany('App\Models\ReceivePurchaseDetail', 'strReceivePurchaseID','strReceivePurchaseID');
    }
    // public function order() {
    //     return $this->hasMany('App\Models\ReceivepurchaseOrder', 'strReceivePurchaseID');
    // }

}
