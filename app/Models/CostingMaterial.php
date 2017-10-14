<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostingMaterial extends Model
{
    protected $table = 'tblcostingmaterial';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'strCostingID',
    	'strMaterialID',
        'strUOMID',
        'dblMatCost',
        'dblUsage',
        'dblFinalCost',

    ];

    public function details(){
        return $this->hasOne('App\Models\Material','strMaterialID','strMaterialID');
    }
    public function unit() {
        return $this->belongsTo('App\Models\Unit', 'strUOMID', 'strUOMID');
    }
}
