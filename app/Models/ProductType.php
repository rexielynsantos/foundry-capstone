<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'tblproducttype';
    protected $primaryKey = 'strProductTypeID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'strProductTypeName',
    	'strProductTypeDesc',
        'strStatus'
    ];

    public function stage(){
        return $this->hasMany('App\Models\ProductTypeDetail', 'strProductTypeID','strProductTypeID');
    }
    public function product(){
        return $this->hasOne('App\Models\Product', 'strProductID', 'strProductID');

    }
    public function matspec(){
        return $this->hasOne('App\Models\MatSpec', 'strMatSpecID', 'strMatSpecID');

    }
}
