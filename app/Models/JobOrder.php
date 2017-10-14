<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    protected $table = 'tbljoborder';
    protected $primaryKey = 'strJobOrdID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'strCustPurchaseID',
    	'boolIsNewProduct',
    	'boolIsRepeatOrder',
        'strJobRemarks',
    	// 'email',   
        'strStatus'
    ];
    public function custpurchase(){
        return $this->belongsTo('App\Models\CustPurchase', 'strCustPurchaseID', 'strCustPurchaseID');
    }
    public function jobticket(){
        return $this->hasOne('App\Models\JobTicket', 'strJobOrdID', 'strJobOrdID');
    }
}
