<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'tbluom';
    protected $primaryKey = 'strUOMID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'strUOMTypeID',
    	'strUOMName',
    	'strUOMDesc',	
    	'strStatus'
    ];
    public function productvariant() {
        return $this->hasOne('App\Models\ProductVariant', 'strProductVariantID', 'strProductVariantID');
    }
    public function materialvariant() {
        return $this->hasOne('App\Models\MaterialVariant', 'strMaterialVariantID', 'strMaterialVariantID');
    }
    public function material() {
        return $this->hasOne('App\Models\Material', 'strMaterialID', 'strMaterialID');
    }
    public function unittype() {
        return $this->belongsTo('App\Models\UnitType', 'strUOMTypeID', 'strUOMTypeID');
    }


}
