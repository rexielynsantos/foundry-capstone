<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustPurchase extends Model
{
    protected $table = 'tblcustpurchase';
    protected $primaryKey = 'strCustPurchaseID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'strPOID',
    	'dtOrderDate',
    	'dtDeliveryDate',
    	'strCustomerID',
    	'strQuoteID',
    ];
    public function quotation(){ 
        return $this->belongsTo('App\Models\Quotation', 'strQuoteID', 'strQuoteID');
    }
    public function joborder(){ 
        return $this->hasOne('App\Models\JobOrder', 'strCustPurchaseID', 'strCustPurchaseID');
    }
    public function customer(){
        return $this->belongsTo('App\Models\Customer', 'strCustomerID', 'strCustomerID');
    }
    // public function quote(){
    //     return $this->belongsTo('App\Models\Quote', 'strQuoteID', 'strQuoteID');
    // }

}
