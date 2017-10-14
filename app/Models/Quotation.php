<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table = 'tblquotation';
    protected $primaryKey = 'strQuoteID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'strTermID',
    	'strCustomerID',
    	'strCostingID',
    	'strQuoteDescription',
    ];

    public function custpurchase(){ 
        return $this->hasOne('App\Models\CustPurchase', 'strCustPurchaseID', 'strCustPurchaseID');
    }
    public function quoteprodvariant(){
        return $this->hasMany('App\Models\QuoteProductVariant', 'strQuoteID', 'strQuoteID');
    }
    public function customer(){
        return $this->belongsTo('App\Models\Customer', 'strCustomerID', 'strCustomerID');
    }
    public function termscondition() {
        return $this->belongsTo('App\Models\TermsCondition', 'strTermID', 'strTermID');
    }
    public function costing() {
        return $this->belongsTo('App\Models\Costing', 'strCostingID', 'strCostingID');
    }
  
}
