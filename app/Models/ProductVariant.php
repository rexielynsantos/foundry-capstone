<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $table = 'tblproductvariant';
    protected $primaryKey = 'strProductVariantID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
    	'intVariantQty',
        'strUOMID',
    	'strProductVariantDesc',
    	'strStatus'

    ];
    public function unit() {
        return $this->belongsTo('App\Models\Unit', 'strUOMID', 'strUOMID');
    }

    public function producttype(){
        return $this->hasMany('App\Models\ProductVariantDetail', 'strProductVariantID','strProductVariantID');
    }
    
}
