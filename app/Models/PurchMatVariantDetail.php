<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchMatVariantDetail extends Model
{
    protected $table = 'tblpurchmatvariantdetail';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
	    'strMaterialID',
        'strMaterialVariantID',
	    'dblAddlQty',
      'totalQty',
        'dblMaterialCost',
        // 'dblTotalQty',
    ];

    public function details() {
        return $this->hasOne('App\Models\MaterialVariant', 'strMaterialVariantID','strMaterialVariantID');
    }
    // public function details1() {
    //     return $this->hasOne('App\Models\MaterialVariant', 'strMaterialVariantID');
    // }
}
