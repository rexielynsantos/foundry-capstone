<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tblcustomer';
    protected $primaryKey = 'strCustomerID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'strCompanyName',
    	'strCustStreet',
    	'strCustBrgy',
    	'strCustCity',
    	'strCustTelNo',
    	'strCustEmail',
    	'strStatus',
    ];
    public function contact(){
        return $this->hasMany('App\Models\CustContact', 'strCustomerID','strCustomerID');
    }
    public function quotation(){
        return $this->hasOne('App\Models\Quotation', 'strCustomerID', 'strCustomerID');
    }
}
