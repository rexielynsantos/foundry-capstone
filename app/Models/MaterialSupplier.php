<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialDetail extends Model
{
    protected $table = 'tblmaterialsupplier';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
    	'strSupplierID',
    	'strMaterialID',
        // 'dblMaterialCost',
    ];
   
    public function details2(){
        return $this->hasOne('App\Models\Supplier','strSupplierID','strSupplierID');
    }
}

