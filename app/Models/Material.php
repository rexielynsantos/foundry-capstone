<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'tblmaterial';
    protected $primaryKey = 'strMaterialID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'strMaterialName',
        'strMaterialVariantID',
    	'strMaterialDesc',
        'intReorderLevel',
        'intReorderQty',
        'strUOMID',
        'dblBasePrice',
    	'strStatus',
    ];
    // public function supplier(){
    //     return $this->hasMany('App\Models\MaterialDetail', 'strMaterialID','strMaterialID');
    // }
    public function unit() {
        return $this->belongsTo('App\Models\Unit', 'strUOMID', 'strUOMID');
    }
    public function variant() {
        return $this->belongsTo('App\Models\MaterialVariant', 'strMaterialVariantID', 'strMaterialVariantID');
    }
    // public function materialvariant(){
    //     return $this->hasMany('App\Models\MaterialDetail', 'strMaterialID','strMaterialID');
    // }
    public function materialsupplier(){
        return $this->hasMany('App\Models\MaterialSupplier', 'strMaterialID','strMaterialID');
    }
}
