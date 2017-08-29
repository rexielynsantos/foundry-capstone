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
    ];
    public function details(){
        return $this->hasOne('App\Models\Material','strMaterialID', 'strMaterialID');
    }
    public function materialvariant(){
        return $this->hasMany('App\Models\ReceiveMatVariantDetail', 'strMaterialID','strMaterialID');
    }

}
