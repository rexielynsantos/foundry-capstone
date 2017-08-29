<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialSupplier extends Model
{
    protected $table = 'tblmaterialsupplier';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
      'strMaterialID',
      'strSupplierID',
    ];

    public function supplier() {
        return $this->belongsTo('App\Models\Supplier', 'strSupplierID', 'strSupplierID');
    }
    
}

