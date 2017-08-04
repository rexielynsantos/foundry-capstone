<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialDetail extends Model
{
    protected $table = 'tblmaterialdetail';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
    	'strMaterialID',
    	'strMaterialVariantID',
    ];
   
    public function details(){
        return $this->hasOne('App\Models\MaterialVariant','strMaterialVariantID','strMaterialVariantID');
    }
}
