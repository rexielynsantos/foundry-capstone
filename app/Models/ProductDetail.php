<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'tblproductdetail';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
    	'strProductID',
    	'strProductVariantID',
    ];
   
    public function details3(){
        return $this->hasOne('App\Models\ProductVariant','strProductVariantID','strProductVariantID');
    }
}
