<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteProductVariant extends Model
{
    protected $table = 'tblquoteproductvariant';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
	    'strProductID',
	    'strProductVariantID',
    ];
    public function details6(){
        return $this->hasOne('App\Models\ProductVariant','strProductVariantID','strProductVariantID');
    }
}
