<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialVariant extends Model
{
    protected $table = 'tblmaterialvariant';
    protected $primaryKey = 'strMaterialVariantID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'intVariantQty',
        'strUOMID',
    	'strMaterialVariantDesc',
    	'strStatus'

    ];
    public function unit() {
        return $this->belongsTo('App\Models\Unit', 'strUOMID', 'strUOMID');
    }
    
    public function receivepurchase() {
        return $this->hasOne('App\Models\ReceivePurchaseDetail', 'strMaterialVariantID', 'strMaterialVariantID');
    }
    // public function material() {
    //     return $this->hasOne('App\Models\MaterialDetail', 'strMaterialVariantID');
    // }
    

}
