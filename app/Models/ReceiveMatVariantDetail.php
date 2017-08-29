<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiveMatVariantDetail extends Model
{
    protected $table = 'tblreceivematvariantdetail';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
	    'strMaterialID',
        'strMaterialVariantID',
	    'intQtyReceived',
	    // 'strUOMID',
	    // 'intQtyLeft'


    ];

    public function details() {
        return $this->hasOne('App\Models\MaterialVariant', 'strMaterialVariantID', 'strMaterialVariantID');
    }
    // public function unit() {
    //     return $this->belongsTo('App\Models\Unit', 'strUOMID', 'strUOMID');
    // }
}	
