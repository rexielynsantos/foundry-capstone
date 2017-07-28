<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTerm extends Model
{
    protected $table = 'tblpaymentterm';
    protected $primaryKey = 'strPaymentTermID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    	'strPaymentTermName',
    	'strPaymentTermDesc',
    	'strStatus',
    ];

     public function purchase(){
        return $this->hasOne('App\Models\Purchase', 'strPaymentTermID', 'strPaymentTermID');
    }
}
