<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'tbluom';
    protected $primaryKey = 'strUOMID';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        // 'strUOMTypeID',
    	'strUOMName',
    	'strUOMDesc',	
    	'strStatus'
    ];
    
  
    public function variant() {
        return $this->hasOne('App\Models\MaterialVariant', 'strMaterialVariantID', 'strMaterialVariantID');
    }
    public function material() {
        return $this->hasOne('App\Models\Material', 'strMaterialID', 'strMaterialID');
    }
      public function product() {
        return $this->hasOne('App\Models\Product', 'strProductID', 'strProductID');
    }
  
}
