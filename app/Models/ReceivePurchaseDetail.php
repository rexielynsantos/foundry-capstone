<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivePurchaseDetail extends Model
{
    protected $table = 'tblreceivepurchasedetail';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'strReceivePurchaseID',
    	'strMaterialID',
        'quantityReceived',
        'qtyReturned',
        'isActive'

    ];
    public function details(){
        return $this->hasOne('App\Models\Material','strMaterialID', 'strMaterialID');
    }


}
