<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariantDetail extends Model
{
    protected $table = 'tblvarianttype';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
    	'strProductVariantID',
    	'strProductTypeID',
    ];
   
    public function details(){
        return $this->hasOne('App\Models\ProductType','strProductTypeID','strProductTypeID');
    }
}
