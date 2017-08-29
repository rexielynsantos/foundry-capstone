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

    ];
    public function purchase() {
        return $this->belongsTo('App\Models\Purchase', 'strPurchaseID', 'strPurchaseID');
    }
    public function orders(){
        return $this->hasMany('App\Models\ReceivePurchaseDetail', 'strReceivePurchaseID','strReceivePurchaseID');
    }

}
