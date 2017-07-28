<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivePurchaseDetail extends Model
{
    protected $table = 'tblreceivepurchasedetail';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'strReceivePurchaseID',
    	'strMaterialID',	
    	'intQtyReceived',
        'strUOMID'

    ];
    public function details(){
        return $this->hasOne('App\Models\PurchaseDetail','strMaterialID','strMaterialID');
    }
    public function unit() {
        return $this->belongsTo('App\Models\Unit', 'strUOMID', 'strUOMID');
    }



}
