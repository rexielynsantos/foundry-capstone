<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'tblstocks';
    protected $primaryKey = 'strStockID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    	'strMaterialID',
    ];
    
    public function material() {
        return $this->belongsTo('App\Models\Material', 'strMaterialID', 'strMaterialID');
    }
}
