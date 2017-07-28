<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'tblmaterial';
    protected $primaryKey = 'strMaterialID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    	'strMaterialName',
    	'strMaterialDesc',
        'intReorderLevel',
        'intReorderQuantity',
        'strUOMID',
    	'strStatus',
    ];
    public function supplier(){
        return $this->hasMany('App\Models\MaterialDetail', 'strMaterialID','strMaterialID');
    }
    public function unit() {
        return $this->belongsTo('App\Models\Unit', 'strUOMID', 'strUOMID');
    }
}
