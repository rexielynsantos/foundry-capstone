<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tblproduct';
    protected $primaryKey = 'strProductID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    	'strProductName',
        'strProductTypeID',
        'strProductDesc',
        // 'strProductImagePath',
        // 'strTempImage',
    	'strStatus'

    ];
    public function producttype() {
        return $this->belongsTo('App\Models\ProductType', 'strProductTypeID', 'strProductTypeID');
    }

    public function productvariant(){
        return $this->hasMany('App\Models\ProductDetail', 'strProductID','strProductID');
    }
    // public function productvariants(){
    //     return $this->hasMany('App\Models\QuoteProductVariant', 'strProductID','strProductID');
    // }

}
