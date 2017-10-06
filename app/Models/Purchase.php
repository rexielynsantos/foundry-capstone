<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'tblpurchase';
    protected $primaryKey = 'strPurchaseID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'strSupplierID',
      'strSupplierContactPerson',
    	'strPaymentTermID',
      'strPStatus',
      'isFinalize',
      'isDelivered'
    ];

    public function supplier() {
        return $this->belongsTo('App\Models\Supplier', 'strSupplierID', 'strSupplierID');
    }
     public function paymentterm() {
        return $this->belongsTo('App\Models\PaymentTerm', 'strPaymentTermID', 'strPaymentTermID');
    }
    public function material(){
        return $this->hasMany('App\Models\PurchaseDetail', 'strPurchaseID','strPurchaseID');
    }
     public function orders(){
        return $this->hasOne('App\Models\ReceivePurchase', 'strPurchaseID');
    }
}
