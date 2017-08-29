<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
	protected $table = 'tblpurchasedetail';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
	    'strPurchaseID',
	    'strMaterialID',
        // 'dblTotalQty',	
    ];

    public function details(){
        return $this->hasOne('App\Models\Material','strMaterialID','strMaterialID');
    }
    public function materialvariant(){
        return $this->hasMany('App\Models\PurchMatVariantDetail', 'strMaterialID','strMaterialID');
    }
   
}
